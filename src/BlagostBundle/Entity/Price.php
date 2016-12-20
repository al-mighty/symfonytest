<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="prices")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\PriceRepository")
 */
class Price extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="TempleService")
     * @ORM\JoinColumn(name="temple_sevrvices_id", referencedColumnName="id")
     */
    private $templeService;

    /**
     * @ORM\ManyToOne(targetEntity="Calculator")
     * @ORM\JoinColumn(name="calculators_id", referencedColumnName="id")
     */
    private $calculator;

    /**
     * @ORM\Column(name="param_value", type="integer")
     */
    private $paramValue;

    /**
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Priest")
     * @ORM\JoinColumn(name="priests_id", referencedColumnName="id")
     */
    private $priest;

    /**
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;

    /**
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $updateDate;

    /**
     * @param TempleService $templeService
     * @return Price
     */
    public function setTempleService(TempleService $templeService)
    {
        $this->templeService = $templeService;

        return $this;
    }

    /**
     * @return TempleService
     */
    public function getTempleService()
    {
        return $this->templeService;
    }

    /**
     * @param Calculator $calculator
     * @return Price
     */
    public function setCalculator(Calculator $calculator)
    {
        $this->calculator = $calculator;

        return $this;
    }

    /**
     * @return Calculator
     */
    public function getCalculator()
    {
        return $this->calculator;
    }

    /**
     * @param string $paramValue
     * @return Price
     */
    public function setParamValue($paramValue)
    {
        $this->paramValue = $paramValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getParamValue()
    {
        return $this->paramValue;
    }

    /**
     * @param float $price
     * @return Price
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
     * @param Priest $priest
     * @return Price
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
     * @param \DateTime $createDate
     * @return Price
     */
    public function setCreateDate(\DateTime $createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $updateDate
     * @return Price
     */
    public function setUpdateDate(\DateTime $updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
}

