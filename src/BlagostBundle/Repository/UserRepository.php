<?php

namespace BlagostBundle\Repository;

use BlagostBundle\Entity\BaseEntity;

class UserRepository extends BaseRepository
{
    /**
     * @param BaseEntity $user
     * @param array $options
     * @return BaseEntity
     * @throws \Exception
     */
    public function save(BaseEntity $user, array $options = [])
    {
        $encoder = isset($options['encoder']) ? $options['encoder'] : null;

        if (!is_null($encoder) && !empty($user->getPassword())) {
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
        }

        return parent::save($user, $options);
    }
}
