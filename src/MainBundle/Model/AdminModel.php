<?php

namespace MainBundle\Model;

use MainBundle\Entity\User;
use MainBundle\Entity\Admin;
use Doctrine\ORM\EntityManager;

/**
 * Class AdminModel
 * @package MainBundle\Model
 */
class AdminModel
{
    private $em;

    /**
     * MembersModel constructor.
     * @param EntityManager $em
     */
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     */
    public function createAdmin(User $user)
    {
        $admin = new Admin();

        $admin->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($admin);
        $this->em->flush();
    }

    /**
     * @param User $user
     * @return null|Admin
     */
    public function getAdmin(User $user)
    {
        return $this->em->getRepository(Admin::class)->findOneBy(['user' => $user]);
    }
}
