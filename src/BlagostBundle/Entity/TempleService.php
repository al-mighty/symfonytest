<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempleServices
 *
 * @ORM\Table(name="temple_services")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\TempleServicesRepository")
 */
class TempleService extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="Temple")
     * @ORM\JoinColumn(name="temples_id", referencedColumnName="id")
     */
    private $temple;

    /**
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="services_id", referencedColumnName="id")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity="Priest")
     * @ORM\JoinColumn(name="priests_id", referencedColumnName="id")
     */
    private $priest;

    /**
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @ORM\Column(name="lower_can_change", type="string", length=1)
     */
    private $lowerCanChange;

    /**
     * @ORM\Column(name="lower_can_delete", type="string", length=1)
     */
    private $lowerCanDelete;

    /**
     * @param Temple $temple
     * @return TempleService
     */
    public function setTemple(Temple $temple)
    {
        $this->temple = $temple;

        return $this;
    }

    /**
     * @return Temple
     */
    public function getTemple()
    {
        return $this->temple;
    }

    /**
     * @param Service $service
     * @return TempleService
     */
    public function setService(Service $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param Priest $priest
     * @return TempleService
     */
    public function setPriest(Priest $priest)
    {
        $this->priest = $priest;

        return $this;
    }

    /**
     * @return Priest
     */
    public function getPriest()
    {
        return $this->priest;
    }

    /**
     * @param integer $level
     * @return TempleService
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
     * @param \DateTime $lowerCanChange
     * @return TempleService
     */
    public function setLowerCanChange(\DateTime $lowerCanChange)
    {
        $this->lowerCanChange = $lowerCanChange;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLowerCanChange()
    {
        return $this->lowerCanChange;
    }

    /**
     * @param \DateTime $lowerCanDelete
     * @return TempleService
     */
    public function setLowerCanDelete(\DateTime $lowerCanDelete)
    {
        $this->lowerCanDelete = $lowerCanDelete;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLowerCanDelete()
    {
        return $this->lowerCanDelete;
    }
}

