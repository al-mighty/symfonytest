<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ProductRepository")
 */
class Product extends BaseEntity
{

//    use StateDateTrait;

    /**
     * @ORM\Column(name="product", type="string", length=45)
     */
    private $product;

    /**
     * @ORM\Column(name="product_desc", type="string", length=45)
     */
    private $productDesc;


    /**
     * Set product
     *
     * @param string $product
     *
     * @return Product
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set productDesc
     *
     * @param string $productDesc
     *
     * @return Product
     */
    public function setProductDesc($productDesc)
    {
        $this->productDesc = $productDesc;

        return $this;
    }

    /**
     * Get productDesc
     *
     * @return string
     */
    public function getProductDesc()
    {
        return $this->productDesc;
    }
}
