<?php


namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="price_list")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\PriceListRepository")
 */
class PriceList extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity="storage")
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="id")
     */
    private $storage;

    /**
     * @ORM\Column(name="price", type="float", length=45)
     */
    private $price;

    /**
     * Set price
     *
     * @param float $price
     *
     * @return PriceList
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set storage
     *
     * @param \MainBundle\Entity\storage $storage
     *
     * @return PriceList
     */
    public function setStorage(\MainBundle\Entity\storage $storage = null)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Get storage
     *
     * @return \MainBundle\Entity\storage
     */
    public function getStorage()
    {
        return $this->storage;
    }
}
