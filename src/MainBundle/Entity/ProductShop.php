<?php

namespace MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="product_shop")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ProductShopRepository")
 */
class ProductShop extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;

    /**
     * @ORM\ManyToOne(targetEntity="Storage")
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="id")
     */
    private $storageId;

    /**
     * @ORM\Column(name="count", type="integer")
     */
    private $count;


    /**
     * Set count
     *
     * @param integer $count
     *
     * @return ProductShop
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set productId
     *
     * @param \MainBundle\Entity\Product $productId
     *
     * @return ProductShop
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

    /**
     * Set storageId
     *
     * @param \MainBundle\Entity\Storage $storageId
     *
     * @return ProductShop
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
}
