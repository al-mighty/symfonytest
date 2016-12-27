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
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\Storage")
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="id")
     */
    private $storageId;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\Staffs")
     * @ORM\JoinColumn(name="staff_id", referencedColumnName="id")
     */
    private $staffId;


    /**
     * Set orderType
     *
     * @param \MainBundle\Entity\Orders $orderType
     *
     * @return Orders
     */
    public function setOrderType(\MainBundle\Entity\Orders $orderType = null)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return \MainBundle\Entity\Orders
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Set storageId
     *
     * @param \MainBundle\Entity\Storage $storageId
     *
     * @return Orders
     */
    public function setStorageId(\MainBundle\Entity\Storage $storageId = null)
    {
        $this->storageId = $storageId;

        return $this;
    }

    /**
     * Get storageId
     *
     * @return \MainBundle\Entity\Storage
     */
    public function getStorageId()
    {
        return $this->storageId;
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
