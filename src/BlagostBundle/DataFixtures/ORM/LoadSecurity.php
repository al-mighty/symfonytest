<?php
namespace BlagostBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadSecurity extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $mainsModel = $this->container->get('model.maintenance');
        $mainsModel->loadGroups();
        $mainsModel->loadRoles();
    }

    public function getOrder()
    {
        return 1;
    }
}