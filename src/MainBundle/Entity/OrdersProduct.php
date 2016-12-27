<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="orders_product")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\OrdersProductRepository")
 */
class OrdersProduct extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\Orders")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $orderIdd;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;


    /**
     * Set orderIdd
     *
     * @param \MainBundle\Entity\OrdersProduct $orderIdd
     *
     * @return OrdersProduct
     */
    public function setOrderIdd(\MainBundle\Entity\OrdersProduct $orderIdd = null)
    {
        $this->orderIdd = $orderIdd;

        return $this;
    }

    /**
     * Get orderIdd
     *
     * @return \MainBundle\Entity\OrdersProduct
     */
    public function getOrderIdd()
    {
        return $this->orderIdd;
    }

    /**
     * Set productId
     *
     * @param \MainBundle\Entity\Product $productId
     *
     * @return OrdersProduct
     */
    public function setProductId(\MainBundle\Entity\Product $productId = null)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return \MainBundle\Entity\Product
     */
    public function getProductId()
    {
        return $this->productId;
    }
}
