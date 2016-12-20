<?php

namespace BlagostBundle\Model;

use BlagostBundle\Entity\Security\Role;
use BlagostBundle\Entity\User;
use BlagostBundle\Entity\Security\Group;
use BlagostBundle\Exception\ProjectException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class SecurityModel
{
    private $em;
    private $container;

    /**
     * SecurityModel constructor.
     * @param EntityManager $em
     * @param Container $container
     */
    public function  __construct(EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * @param $login
     * @param $password
     * @param $email
     * @throws ProjectException
     */
    public function createUser($login, $password, $email)
    {
        $this->em->beginTransaction();
        $encoder = $this->container->get('security.password_encoder');

        try {
            $user = new User();
            $encoded = $encoder->encodePassword($user, $password);
            
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
            $this->setGroupsToUser($user, [Group::GROUP_CONGREGANT]);
            $this->em->commit();
        } catch (\Exception $e) {
            $this->em->rollback();
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
}
