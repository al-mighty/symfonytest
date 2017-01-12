<?php

namespace MainBundle\DataFixtures\ORM;

use MainBundle\Entity\Security\Group;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAdmin extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $adminRepo = $manager->getRepository('MainBundle:admin');
        $personalDataRepo = $manager->getRepository('MainBundle:PersonalData');
        $userRepo = $manager->getRepository('MainBundle:User');
        $encoder = $this->container->get('security.password_encoder');

        foreach ($this->loadFromYaml('admin') as $data) {

            $userArray = $this->extractArrayFrom($data, 'user');
            $this->convertDateTime($userArray, ['stateDate', 'createDate']);
            $data['user'] = $userRepo->create($userArray, ['encoder' => $encoder]);
            $this->container->get('model.security')->setGroupsToUser($data['user'], [Group::GROUP_ADMIN]);

            $personalDataArray = $this->extractArrayFrom($data, 'personalData');
            $data['personalData'] = $personalDataRepo->create($personalDataArray);

            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $adminRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 2;
    }
}