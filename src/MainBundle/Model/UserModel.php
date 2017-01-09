<?php

namespace MainBundle\Model;

use MainBundle\Entity\User;
use Doctrine\ORM\EntityManager;

/**
 * Class UserModel
 * @package MainBundle\Model
 */
class UserModel
{
    private $em;

    /**
     * UserModel constructor.
     * @param EntityManager $em
     */
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     */
    public function doAcceptPdProcessing(User $user)
    {
        $user->setPdProcessingAccepted(true);
        $this->em->flush($user);
    }

    public function allUsersRegister(){
        $allUsers = $this->em->getRepository(User::class)->findAll();

        return $allUsers;
    }
}
