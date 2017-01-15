<?php

namespace MainBundle\DataFixtures\ORM;

use MainBundle\Entity\PersonalData;
use MainBundle\Entity\Security\Group;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\StoreKeeper;
use MainBundle\Entity\Stock;
use MainBundle\Entity\User;

class LoadStoreKeeper extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $storeKeeperRepo = $manager->getRepository(StoreKeeper::class);
        $stockRepo = $manager->getRepository(Stock::class);
        $personalDataRepo = $manager->getRepository(PersonalData::class);
        $userRepo = $manager->getRepository(User::class);
        $encoder = $this->container->get('security.password_encoder');

        foreach ($this->loadFromYaml('store_keeper') as $data) {

            $userArray = $this->extractArrayFrom($data, 'user');
            $this->convertDateTime($userArray, ['stateDate', 'createDate']);
            $data['user'] = $userRepo->create($userArray, ['encoder' => $encoder]);
            $this->container->get('model.security')->setGroupsToUser($data['user'], [Group::GROUP_STORE_KEEPER]);

            $personalDataArray = $this->extractArrayFrom($data, 'personalData');
            $data['personalData'] = $personalDataRepo->create($personalDataArray);

            $stockDataArray = $this->extractArrayFrom($data,'stock');
            $data['stock'] = $stockRepo->create($stockDataArray);

            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $storeKeeperRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 3;
    }
}