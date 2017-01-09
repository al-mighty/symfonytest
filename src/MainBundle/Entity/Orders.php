<?php

namespace MainBundle\Entity;

use MainBundle\Entity\Interfaces\PersonalDataInterface;
use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\OrdersRepository")
 */
class Orders extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\OrderType")
     * @ORM\JoinColumn(name="order_type_id", referencedColumnName="id")
     */
    private $orderType;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\PriceList")
     * @ORM\JoinColumn(name="price_list", referencedColumnName="id")
     */
    private $priceList;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\Staffs")
     * @ORM\JoinColumn(name="staff_id", referencedColumnName="id")
     */
    private $staffId;


    /**
     * Set orderType
     *
     * @param \MainBundle\Entity\OrderType $orderType
     *
     * @return Orders
     */
    public function setOrderType(\MainBundle\Entity\OrderType $orderType = null)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return \MainBundle\Entity\OrderType
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Set priceList
     *
     * @param \MainBundle\Entity\PriceList $priceList
     *
     * @return Orders
     */
    public function setPriceList(\MainBundle\Entity\PriceList $priceList = null)
    {
        $this->priceList = $priceList;

        return $this;
    }

    /**
     * Get priceList
     *
     * @return \MainBundle\Entity\PriceList
     */
    public function getPriceList()
    {
        return $this->priceList;
    }

    /**
     * Set staffId
     *
     * @param \MainBundle\Entity\Staffs $staffId
     *
     * @return Orders
     */
    public function setStaffId(\MainBundle\Entity\Staffs $staffId = null)
    {
        $this->staffId = $staffId;

        return $this;
    }

    /**
     * Get staffId
     *
     * @return \MainBundle\Entity\Staffs
     */
    public function getStaffId()
    {
        return $this->staffId;
    }
}
