<?php

namespace MainBundle\DataFixtures\ORM;

use MainBundle\Entity\Security\Group;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMembers extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $membersRepo = $manager->getRepository('MainBundle:members');
        $personalDataRepo = $manager->getRepository('MainBundle:PersonalData');
        $userRepo = $manager->getRepository('MainBundle:User');
        $encoder = $this->container->get('security.password_encoder');

        foreach ($this->loadFromYaml('members') as $data) {

            $userArray = $this->extractArrayFrom($data, 'user');
            $this->convertDateTime($userArray, ['stateDate', 'createDate']);
            $data['user'] = $userRepo->create($userArray, ['encoder' => $encoder]);
            $this->container->get('model.security')->setGroupsToUser($data['user'], [Group::GROUP_MEMBERS]);

            $personalDataArray = $this->extractArrayFrom($data, 'personalData');
            $data['personalData'] = $personalDataRepo->create($personalDataArray);

            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $membersRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 2;
    }
}