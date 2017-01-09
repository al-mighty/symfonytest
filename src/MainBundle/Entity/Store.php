<?php


namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="store")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\StoreRepository")
 */
class Store extends BaseEntity
{

    /**
     * @ORM\Column(name="store", type="string", length=45)
     */
    private $store;


    /**
     * Set store
     *
     * @param string $store
     *
     * @return Store
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return string
     */
    public function getStore()
    {
        return $this->store;
    }
}
