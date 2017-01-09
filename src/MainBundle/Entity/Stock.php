<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\StockRepository")
 */
class Stock extends BaseEntity
{
    /**
     * @ORM\Column(name="stock", type="string", length=45)
     */
    private $stock;


    /**
     * Set stock
     *
     * @param string $stock
     * @return Stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
    }
}
