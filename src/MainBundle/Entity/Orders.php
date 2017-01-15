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
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\StoreKeeper")
     * @ORM\JoinColumn(name="store_keeper_id", referencedColumnName="id")
     */
    private $storeKeeper;


    /**
     * Set orderType
     *
     * @param \MainBundle\Entity\OrderType $orderType
     *
     * @return Orders
     */
    public function setOrderType(OrderType $orderType = null)
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
    public function setPriceList(PriceList $priceList = null)
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
     * @param StoreKeeper|null $storeKeeper
     * @return $this
     */
    public function setStoreKeeper(StoreKeeper $storeKeeper = null)
    {
        $this->storeKeeper = $storeKeeper;

        return $this;
    }

    /**
     * Get StoreKeeper
     *
     * @return \MainBundle\Entity\StoreKeeper
     */
    public function getStoreKeeper()
    {
        return $this->storeKeeper;
    }
}
