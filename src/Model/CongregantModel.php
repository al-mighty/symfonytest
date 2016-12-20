<?php

namespace BlogBundle\Model;

use BlogBundle\Entity\User;
use BlogBundle\Entity\Congregant;
use BlogBundle\Entity\PersonalData;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class CongregantModel
 * @package BlogBundle\Model
 */
class CongregantModel
{
    private $em;
    private $container;

    /**
     * CongregantModel constructor.
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
    public function createCongregant(User $user)
    {
        $congregant = new Congregant();

        $congregant->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($congregant);
        $this->em->flush();
    }

    /**
     * @param User $user
     * @return null|Congregant
     */
    public function getCongregant(User $user)
    {
        return $this->em->getRepository(Congregant::class)->findOneBy(['user' => $user]);
    }
}
