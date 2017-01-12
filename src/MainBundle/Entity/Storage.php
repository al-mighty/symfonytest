<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="storage")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\StorageRepository")
 */
class Storage extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Store")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
     */
    private $store;

    /**
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumn(name="stock_id", referencedColumnName="id")
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\Column(name="count_store", type="integer")
     */
    private $countStore;

    /**
     * @ORM\Column(name="count_stock", type="integer")
     */
    private $countStock;


    /**
     * Set countStore
     *
     * @param integer $countStore
     *
     * @return Storage
     */
    public function setCountStore($countStore)
    {
        $this->countStore = $countStore;

        return $this;
    }

    /**
     * Get countStore
     *
     * @return integer
     */
    public function getCountStore()
    {
        return $this->countStore;
    }

    /**
     * Set countStock
     *
     * @param integer $countStock
     *
     * @return Storage
     */
    public function setCountStock($countStock)
    {
        $this->countStock = $countStock;

        return $this;
    }

    /**
     * Get countStock
     *
     * @return integer
     */
    public function getCountStock()
    {
        return $this->countStock;
    }

    /**
     * Set store
     *
     * @param \MainBundle\Entity\Store $store
     *
     * @return Storage
     */
    public function setStore(Store $store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \MainBundle\Entity\Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param Stock $stock
     * @return Storage
     */
    public function setStock(Stock $stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set product
     *
     * @param \MainBundle\Entity\Product $product
     *
     * @return Storage
     */
    public function setProduct(\MainBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \MainBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
