<?php

namespace MainBundle\Model\Maintenance;

use MainBundle\Entity\Security\Group;
use MainBundle\Entity\Security\Role;
use MainBundle\Exception\ProjectException;
use MainBundle\Model\SecurityModel;
use Doctrine\ORM\EntityManager;

class MaintenanceModel
{
    private $em;
    private $securityModel;

    /**
     * MaintenanceModel constructor.
     * @param EntityManager $em
     * @param SecurityModel $securityModel
     */
    public function __construct(EntityManager $em, SecurityModel $securityModel)
    {
        $this->em = $em;
        $this->securityModel = $securityModel;
    }

    public function loadGroups()
    {
        $this->em->getRepository(Group::class)->load();
    }

    public function loadRoles()
    {
        $this->em->getRepository(Role::class)->load();
    }

    /**
     * @param array $data
     * @throws ProjectException
     */
    public function loadGroupRoles(array $data)
    {
        $groupRepo = $this->em->getRepository(Group::class);
        $roleRepo = $this->em->getRepository(Role::class);

        foreach ($data as $groupCode => $arrayRoles) {
            $group = $groupRepo->findOneBy(['code' => $groupCode]);

            if (is_null($group)) {
                throw new ProjectException(sprintf("Group with code %s not found", $groupCode));
            }

            $groupRoles = $group->getRoles();

            foreach ($arrayRoles as $roleCode) {
                $role = $roleRepo->findOneBy(['code' => $roleCode]);

                if (is_null($role)) {
                    throw new ProjectException(sprintf("Role with code %s not found", $roleCode));
                }

                $groupRoles->add($role);
            }

            $this->em->flush($group);
        }
    }

    /**
     * @param $role_id
     * @param $group_id
     */
    public function setRoleToGroup($role_id, $group_id)
    {
        $this->securityModel->setRoleToGroup($role_id, $group_id);
    }
}
