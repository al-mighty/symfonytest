<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="favourite_temples")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\FavouriteTempleRepository")
 */
class FavouriteTemple extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Congregant")
     * @ORM\JoinColumn(name="congregants_id", referencedColumnName="id")
     */
    private $congregant;

    /**
     * @ORM\ManyToOne(targetEntity="Temple")
     * @ORM\JoinColumn(name="temples_id", referencedColumnName="id")
     */
    private $temple;

    /**
     * @ORM\Column(name="favour_type", type="string", length=45)
     */
    private $favourType;

    /**
     * @ORM\Column(name="counter", type="integer", nullable=true)
     */
    private $counter;

    /**
     * @param Congregant $congregant
     * @return FavouriteTemple
     */
    public function setCongregantId(Congregant $congregant)
    {
        $this->congregant = $congregant;

        return $this;
    }

    /**
     * @return Congregant
     */
    public function getCongregant()
    {
        return $this->congregant;
    }

    /**
     * @param Temple $temple
     * @return FavouriteTemple
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
     * @param string $favourType
     * @return FavouriteTemple
     */
    public function setFavourType($favourType)
    {
        $this->favourType = $favourType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFavourType()
    {
        return $this->favourType;
    }

    /**
     * @param integer $counter
     * @return FavouriteTemple
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;

        return $this;
    }

    /**
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }
}

