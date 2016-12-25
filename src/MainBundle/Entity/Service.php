<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * Service
 *
 * @ORM\Table(name="services")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ServiceRepository")
 */
class Service extends BaseEntity
{
    use StateDateTrait;
    
    const STATE_ACTIVE = 'active';

    /**
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @ORM\Column(name="short_desc", type="text")
     */
    private $shortDesc;

    /**
     * @ORM\Column(name="long_desc", type="text", nullable=true)
     */
    private $longDesc;

    /**
     * @param string $name
     * @return Service
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
     * @param string $shortDesc
     * @return Service
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * @param string $longDesc
     * @return Service
     */
    public function setLongDesc($longDesc)
    {
        $this->longDesc = $longDesc;

        return $this;
    }

    /**
     * @return string
     */
    public function getLongDesc()
    {
        return $this->longDesc;
    }
}
