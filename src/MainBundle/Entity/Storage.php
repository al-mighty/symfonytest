<?php

namespace MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="storage")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\StorageRepository")
 */
class Storage extends BaseEntity
{
    /**
     * @ORM\Column(name="source_delivery", type="string", length=45)
     */
    private $sourceDelivery;

    /**
     * Set sourceDelivery
     *
     * @param string $sourceDelivery
     *
     * @return Storage
     */
    public function setSourceDelivery($sourceDelivery)
    {
        $this->sourceDelivery = $sourceDelivery;

        return $this;
    }

    /**
     * Get sourceDelivery
     *
     * @return string
     */
    public function getSourceDelivery()
    {
        return $this->sourceDelivery;
    }

}
