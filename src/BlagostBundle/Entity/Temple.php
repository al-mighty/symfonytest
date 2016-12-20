<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Temple
 *
 * @ORM\Table(name="temples")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\TempleRepository")
 */
class Temple extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Temple", inversedBy="childrenTemple")
     * @ORM\JoinColumn(name="temples_id", referencedColumnName="id")
     */
    private $parentTemple;

    /**
     * @ORM\OneToMany(targetEntity="AddressPart", mappedBy="parentTemple")
     */
    private $childrenTemple;

    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     */
    private $order;

    public function __construct()
    {
        $this->childrenTemple = new ArrayCollection();
    }

    /**
     * @param string $name
     * @return Temple
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Temple $parentTemple
     * @return Temple
     */
    public function setParentTemple(Temple $parentTemple)
    {
        $this->parentTemple = $parentTemple;

        return $this;
    }

    /**
     * @return Temple
     */
    public function getParentTemple()
    {
        return $this->parentTemple;
    }

    /**
     * @param ArrayCollection $childrenTemple
     * @return Temple
     */
    public function setChildrenTemple($childrenTemple)
    {
        $this->childrenTemple = $childrenTemple;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildrenTemple()
    {
        return $this->childrenTemple;
    }

    /**
     * @param Address $address
     * @return Temple
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param integer $level
     * @return Temple
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param Order $order
     * @return Temple
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}

