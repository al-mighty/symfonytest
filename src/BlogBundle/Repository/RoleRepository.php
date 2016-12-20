<?php

namespace BlogBundle\Repository;

use BlogBundle\Entity\Security\Role;

class RoleRepository extends BaseRepository
{
    public function load()
    {
        $roles = Role::ROLE_NAMES;

        foreach ($roles as $code => $name) {
            $role = new Role();
            $role->setParams([
                'code' => $code,
                'name' => $name
            ]);
            $this->_em->persist($role);
        }

        $this->_em->flush();
    }
}
