<?php
namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadSecurity extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $maintenanceModel = $this->container->get('model.maintenance');
        $maintenanceModel->loadGroups();
        $maintenanceModel->loadRoles();

        $data = $this->loadFromYaml('groups_roles');

        try {
            $maintenanceModel->loadGroupRoles($data);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

    public function getOrder()
    {
        return 1;
    }
}