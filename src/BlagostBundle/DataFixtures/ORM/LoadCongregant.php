<?php


namespace BlagostBundle\DataFixtures\ORM;

use BlagostBundle\Entity\Security\Group;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCongregants extends BaseLoadFixture
{

    public function load(ObjectManager $manager)
    {
        $congregantsRepo = $manager->getRepository('BlagostBundle:Congregant');
        $personalDataRepo = $manager->getRepository('BlagostBundle:PersonalData');
        $userRepo = $manager->getRepository('BlagostBundle:User');
        $encoder = $this->container->get('security.password_encoder');

        foreach ($this->loadFromYaml('congregant') as $data) {

            $userArray = $this->extractArrayFrom($data, 'user');
            $this->convertDateTime($userArray, ['stateDate', 'createDate']);
            $data['user'] = $userRepo->create($userArray, ['encoder' => $encoder]);
            $this->container->get('model.security')->setGroupsToUser($data['user'], [Group::GROUP_CONGREGANT]);

            $personalDataArray = $this->extractArrayFrom($data, 'personalData');
            $data['personalData'] = $personalDataRepo->create($personalDataArray);

            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $congregantsRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 2;
    }
}