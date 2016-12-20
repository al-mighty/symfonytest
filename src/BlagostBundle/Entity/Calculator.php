<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calculator
 *
 * @ORM\Table(name="calculators")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\CalculatorRepository")
 */
class Calculator extends BaseEntity
{

    /**
     * @ORM\Column(name="calculator_type_id", type="integer")
     */
    private $calculatorTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="sevrvices_id", referencedColumnName="id")
     */
    private $service;

    /**
     * @ORM\Column(name="param_value", type="integer", nullable=true)
     */
    private $paramValue;

    /**
     * @ORM\Column(name="price_type", type="string", length=45, nullable=true)
     */
    private $priceType;

    /**
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="DicData")
     * @ORM\JoinColumn(name="dic_data_id", referencedColumnName="id")
     */
    private $dicData;


    /**
     * @param integer $calculatorTypeId
     * @return Calculator
     */
    public function setCalculatorTypeId($calculatorTypeId)
    {
        $this->calculatorTypeId = $calculatorTypeId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCalculatorTypeId()
    {
        return $this->calculatorTypeId;
    }

    /**
     * @param Service $service
     * @return Calculator
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
     * @param integer $paramValue
     * @return Calculator
     */
    public function setParamValue($paramValue)
    {
        $this->paramValue = $paramValue;

        return $this;
    }

    /**
     * @return int
     */
    public function getParamValue()
    {
        return $this->paramValue;
    }

    /**
     * @param string $priceType
     * @return Calculator
     */
    public function setPriceType($priceType)
    {
        $this->priceType = $priceType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * @param float $price
     * @return Calculator
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
     * @param DicData $dicData
     * @return Calculator
     */
    public function setDicData(DicData $dicData)
    {
        $this->dicData = $dicData;

        return $this;
    }

    /**
     * @return DicData
     */
    public function getDicData()
    {
        return $this->dicData;
    }
}

