<?php

namespace MainBundle\Model;

use MainBundle\Entity\User;
use MainBundle\Entity\Members;
use Doctrine\ORM\EntityManager;

/**
 * Class MembersModel
 * @package MainBundle\Model
 */
class MembersModel
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
    public function createMembers(User $user)
    {
        $Members = new Members();

        $Members->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($Members);
        $this->em->flush();
    }

    /**
     * @param User $user
     * @return null|Members
     */
    public function getMembers(User $user)
    {
        return $this->em->getRepository(Members::class)->findOneBy(['user' => $user]);
    }
}
