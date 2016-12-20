<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="addresses_parts")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\AddressPartRepository")
 */
class AddressPart extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="AddressPart", inversedBy="childrenAddressPart")
     * @ORM\JoinColumn(name="address_parts_id", referencedColumnName="id")
     */
    private $parentAddressPart;

    /**
     * @ORM\OneToMany(targetEntity="AddressPart", mappedBy="parentAddressPart")
     */
    private $childrenAddressPart;

    /**
     * @ORM\Column(name="part_type", type="string", length=45)
     */
    private $partType;

    /**
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    public function __construct()
    {
        $this->childrenAddressPart = new ArrayCollection();
    }

    /**
     * @param AddressPart $parentAddressPart
     * @return AddressPart
     */
    public function setParentAddressPart(AddressPart $parentAddressPart)
    {
        $this->parentAddressPart = $parentAddressPart;

        return $this;
    }

    /**
     * @return AddressPart
     */
    public function getParentAddressPart()
    {
        return $this->parentAddressPart;
    }

    /**
     * @param ArrayCollection $childrenAddressPart
     * @return $this
     */
    public function setChildrenAddressPart($childrenAddressPart)
    {
        $this->childrenAddressPart = $childrenAddressPart;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildrenAddressPart()
    {
        return $this->childrenAddressPart;
    }

    /**
     * @param string $partType
     * @return AddressPart
     */
    public function setPartType($partType)
    {
        $this->partType = $partType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPartType()
    {
        return $this->partType;
    }

    /**
     * @param string $name
     * @return AddressPart
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
}

