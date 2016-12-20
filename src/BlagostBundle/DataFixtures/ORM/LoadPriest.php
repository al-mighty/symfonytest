<?php


namespace BlagostBundle\DataFixtures\ORM;

use BlagostBundle\Entity\Security\Group;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPriest extends BaseLoadFixture
{

    public function load(ObjectManager $manager)
    {
        $priestRepo = $manager->getRepository('BlagostBundle:Priest');
        $personalDataRepo = $manager->getRepository('BlagostBundle:PersonalData');
        $userRepo = $manager->getRepository('BlagostBundle:User');
        $templeRepo = $manager->getRepository('BlagostBundle:Temple');

        $encoder = $this->container->get('security.password_encoder');

        foreach ($this->loadFromYaml('priest') as $data) {

            $userArray = $this->extractArrayFrom($data, 'user');
            $this->convertDateTime($userArray, ['stateDate', 'createDate']);
            $data['user'] = $userRepo->create($userArray, ['encoder' => $encoder]);
            $this->container->get('model.security')->setGroupsToUser($data['user'], [Group::GROUP_PRIEST]);

            $personalDataArray = $this->extractArrayFrom($data, 'personalData');
            $data['personalData'] = $personalDataRepo->create($personalDataArray);

            $templeArray = $this->extractArrayFrom($data, 'temple');
            $this->convertDateTime($templeArray, ['stateDate', 'createDate']);
            $data['temple'] = $templeRepo->create($templeArray);

            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $priestRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 3;
    }
}