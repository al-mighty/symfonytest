<?php

namespace BlagostBundle\Model\Maintenance;

use BlagostBundle\Entity\Security\Group;
use BlagostBundle\Entity\Security\Role;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class MaintenanceModel
{
    private $em;
    private $container;

    /**
     * MaintenanceModel constructor.
     * @param EntityManager $em
     * @param Container $container
     */
    public function  __construct(EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    function loadGroups()
    {
        $this->em->getRepository(Group::class)->load();
    }
    
    function loadRoles()
    {
        $this->em->getRepository(Role::class)->load();
    }

    /**
     * @param $role_id
     * @param $group_id
     * @return mixed
     */
    public function setRoleToGroup($role_id, $group_id)
    {
        $securityModel = $this->container->get('model.security');
        
        return $securityModel->setRoleToGroup($role_id, $group_id);
    }
}
