<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\AddressRepository")
 */
class Address extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="AddressPart")
     * @ORM\JoinColumn(name="addresses_parts_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="AddressPart")
     * @ORM\JoinColumn(name="addresses_parts_id1", referencedColumnName="id")
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AddressPart")
     * @ORM\JoinColumn(name="addresses_parts_id2", referencedColumnName="id")
     */
    private $city;

    /**
     * @ORM\Column(name="text1", type="string", length=45, nullable=true)
     */
    private $text1;

    /**
     * @ORM\Column(name="text2", type="string", length=45, nullable=true)
     */
    private $text2;

    /**
     * @ORM\Column(name="text3", type="string", length=45, nullable=true)
     */
    private $text3;

    /**
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude;

    /**
     * @param AddressPart $country
     * @return Address
     */
    public function setCountry(AddressPart $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return AddressPart
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param AddressPart $region
     * @return Address
     */
    public function setRegion(AddressPart $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return AddressPart
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param AddressPart $city
     * @return Address
     */
    public function setCity(AddressPart $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return AddressPart
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $text1
     * @return Address
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;

        return $this;
    }

    /**
     * @return string
     */
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * @param string $text2
     * @return Address
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;

        return $this;
    }

    /**
     * @return string
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * @param string $text3
     * @return Address
     */
    public function setText3($text3)
    {
        $this->text3 = $text3;

        return $this;
    }

    /**
     * @return string
     */
    public function getText3()
    {
        return $this->text3;
    }

    /**
     * @param float $latitude
     * @return Address
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     * @return Address
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}

