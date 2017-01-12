<?php

namespace MainBundle\Model;

use MainBundle\Entity\Security\Role;
use MainBundle\Entity\User;
use MainBundle\Entity\Security\Group;
use MainBundle\Exception\InvalidLoginException;
use MainBundle\Exception\ProjectException;
use MainBundle\Service\PasswordGenerator;
use MainBundle\Utils\MyLogHelper;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

/**
 * Class SecurityModel
 * @package MainBundle\Model
 */
class SecurityModel
{
    const RESET_PWD_LENGTH = 10;

    private $em;
    private $pwdGenerator;
    private $encoder;
    private $adminModel;

    /**
     * SecurityModel constructor.
     * @param EntityManager $em
     * @param PasswordGenerator $pwdGenerator
     * @param UserPasswordEncoder $encoder
     * @param AdminModel $membersModel
     */
    public function __construct(
        EntityManager $em,
        PasswordGenerator $pwdGenerator,
        UserPasswordEncoder $encoder,
        AdminModel $adminModel
    ) {
        $this->em = $em;
        $this->pwdGenerator = $pwdGenerator;
        $this->encoder = $encoder;
        $this->membersModel = $adminModel;
    }

    /**
     * @param $login
     * @param $password
     * @param $email
     * @throws ProjectException
     */
    public function createUser($login, $password, $email)
    {
        $this->em->getConnection()->beginTransaction();

        try {
            $user = new User();
            $encoded = $this->encoder->encodePassword($user, $password);

            $user->setParams([
                'username' => $login,
                'password' => $encoded,
                'email' => $email,
                'state' => 'active',
                'stateDate' => new \DateTime(),
                'createDate' => new \DateTime()
            ]);

            $this->em->persist($user);
            $this->em->flush($user);
            $this->setGroupsToUser($user, [Group::GROUP_ADMIN]);
            $this->adminModel->createAdmin($user);
            $this->em->getConnection()->commit();
        } catch (\Exception $e) {
            $this->em->getConnection()->rollback();
            throw new ProjectException('Failed to create user');
        }
    }

    /**
     * @param User $user
     * @param array $groupCodes
     */
    public function setGroupsToUser(User $user, array $groupCodes)
    {
        $groupRepo = $this->em->getRepository(Group::class);
        $userGroups = $user->getGroupObjects();

        foreach ($groupCodes as $code) {
            $group = $groupRepo->findOneBy(['code' => $code]);
            $userGroups->add($group);
        }

        $this->em->flush();
    }

    /**
     * @param $role_id
     * @param $group_id
     * @throws ProjectException
     */
    public function setRoleToGroup($role_id, $group_id)
    {
        $group = $this->em->getRepository(Group::class)->find($group_id);
        $role = $this->em->getRepository(Role::class)->find($role_id);
        $groupRoles = $group->getRoles();

        if ($groupRoles->contains($role)) {
            throw new ProjectException(sprintf(
                'Group %s already contains role %s',
                $group->getCode(),
                $role->getCode()
            ));
        } else {
            $groupRoles->add($role);
            $this->em->flush();
        }
    }

    /**
     * @param $phoneNumber
     * @throws InvalidLoginException
     * @throws ProjectException
     * @throws \Doctrine\DBAL\ConnectionException
     */
    public function updateUserPassword($phoneNumber)
    {
        $user = $this->checkLoginExists($phoneNumber);
        $newPassword = $this->pwdGenerator->generate(self::RESET_PWD_LENGTH);
        $this->em->getConnection()->beginTransaction();

        try {
            $encoded = $this->encoder->encodePassword($user, $newPassword);
            $user->setPassword($encoded);
            $this->em->flush($user);

            //TODO: put SMS message to queue. Temporary just a notification is written into a log file.
            MyLogHelper::lg(sprintf("Password %s was set for user %s", $newPassword, $user->getUsername()));

            $this->em->getConnection()->commit();
        } catch (\Exception $e) {
            $this->em->getConnection()->rollback();
            throw new ProjectException('Could not update password');
        }
    }

    /**
     * @param $login
     * @return null|User
     * @throws InvalidLoginException
     */
    private function checkLoginExists($login)
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['login' => $login]);

        if (is_null($user)) {
            throw new InvalidLoginException();
        }

        return $user;
    }
}
