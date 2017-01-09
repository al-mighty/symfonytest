<?php

namespace StuntBundle\Model;

use StuntBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class UserModel
 * @package StuntBundle\Model
 */
class UserModel
{
    private $em;
    private $container;

    /**
     * UserModel constructor.
     * @param EntityManager $em
     * @param Container $container
     */
    public function  __construct(EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * @param User $user
     */
    public function doAcceptPdProcessing(User $user)
    {
        $user->setPdProcessingAccepted(true);
        $this->em->flush($user);
    }
}