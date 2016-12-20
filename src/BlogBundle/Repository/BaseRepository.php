<?php

namespace BlogBundle\Repository;
use BlogBundle\Entity\BaseEntity;
use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository
{

    /**
     * @param array $data
     * @param array $options
     * @return BaseEntity
     */
    public function create(array $data, array $options = [])
    {
        $class = $this->getClassName();
        $entity = new $class();

        return $this->update($entity, $data, $options);
    }

    /**
     * @param BaseEntity $entity
     * @param array $data
     * @param array $options
     * @return BaseEntity
     * @throws \Exception
     */
    public function update(BaseEntity $entity, array $data, array $options = [])
    {
        $entity->setParams($data);

        return $this->save($entity, $options);
    }

    /**
     * @param BaseEntity $entity
     * @param array $options
     * @return BaseEntity
     * @throws \Exception
     */
    public function save(BaseEntity $entity, array $options = [])
    {

        $this->_em->beginTransaction();
        try {
            $this->_em->persist($entity);
            $this->_em->flush($entity);
            $this->_em->commit();

        } catch (\Exception $e) {
            $this->_em->rollback();
            throw $e;
        }

        return $entity;
    }
}
