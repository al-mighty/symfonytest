<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="order_type")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\OrderTypeRepository")
 */
class OrderType extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\Column(name="order_type", type="string", length=45)
     */
    private $orderType;



    /**
     * Set orderType
     *
     * @param string $orderType
     *
     * @return OrderType
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->orderType;
    }
}
