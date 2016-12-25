<?php

namespace MainBundle\Repository;

use MainBundle\Entity\Security\Group;

class GroupRepository extends BaseRepository
{
    /**
     * Loads groups from array into database
     */
    public function load()
    {
        $currentGroups = $this->findAll();

        foreach ($currentGroups as $group) {
            $this->_em->remove($group);
        }

        $this->_em->flush();
        $groups = Group::GROUP_NAMES;

        foreach ($groups as $code => $name) {
            $group = new Group();
            $group->setParams([
                    'code' => $code,
                    'name' => $name
                ]);
            $this->_em->persist($group);
        }

        $this->_em->flush();
    }
}
