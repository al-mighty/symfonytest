<?php

namespace StuntBundle\Model\Maintenance;

use StuntBundle\Entity\Security\Group;
use StuntBundle\Entity\Security\Role;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class MaintenanceModel
{
    private $em;
    private $container;

    /**
     * @param EntityManager $em
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
