<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\OrderRepository")
 */
class Order extends BaseEntity
{

    /**
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="sevrvices_id", referencedColumnName="id")
     */
    private $service;

    /**
     * @ORM\Column(name="temples_id_source", type="integer", nullable=true)
     */
    private $templesIdSource;

    /**
     * @ORM\ManyToOne(targetEntity="Temple")
     * @ORM\JoinColumn(name="temples_id_dest", referencedColumnName="id")
     */
    private $temple;

    /**
     * @ORM\ManyToOne(targetEntity="Congregant")
     * @ORM\JoinColumn(name="congregants_id", referencedColumnName="id")
     */
    private $congregant;

    /**
     * @ORM\Column(name="data", type="text")
     */
    private $data;

    /**
     * @ORM\Column(name="data2", type="text", nullable=true)
     */
    private $data2;

    /**
     * @ORM\Column(name="data3", type="text", nullable=true)
     */
    private $data3;

    /**
     * @ORM\Column(name="groups", type="integer")
     */
    private $groups;

    /**
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\Column(name="paid", type="float")
     */
    private $paid;


    /**
     * @param Service $service
     * @return Order
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
     * @param integer $templesIdSource
     * @return Order
     */
    public function setTemplesIdSource($templesIdSource)
    {
        $this->templesIdSource = $templesIdSource;

        return $this;
    }

    /**
     * @return int
     */
    public function getTemplesIdSource()
    {
        return $this->templesIdSource;
    }

    /**
     * @param Temple $temple
     * @return Order
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
     * @param Congregant $congregant
     * @return Order
     */
    public function setCongregant(Congregant $congregant)
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
     * @param string $data
     * @return Order
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data2
     * @return Order
     */
    public function setData2($data2)
    {
        $this->data2 = $data2;

        return $this;
    }

    /**
     * @return string
     */
    public function getData2()
    {
        return $this->data2;
    }

    /**
     * @param string $data3
     * @return Order
     */
    public function setData3($data3)
    {
        $this->data3 = $data3;

        return $this;
    }

    /**
     * @return string
     */
    public function getData3()
    {
        return $this->data3;
    }

    /**
     * @param integer $groups
     * @return Order
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * @return int
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param float $price
     * @return Order
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $paid
     * @return Order
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return float
     */
    public function getPaid()
    {
        return $this->paid;
    }
}

