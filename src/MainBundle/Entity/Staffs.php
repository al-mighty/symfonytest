<?php

namespace MainBundle\Entity;

use MainBundle\Entity\Interfaces\PersonalDataInterface;
use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="staffs")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\StaffRepository")
 */
class Staffs extends BaseEntity implements PersonalDataInterface
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="PersonalData")
     * @ORM\JoinColumn(name="personal_data_id", referencedColumnName="id")
     */
    private $personalData;

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\Stock")
     * @ORM\JoinColumn(name="stock_id", referencedColumnName="id")
     */
    private $stock;

    /**
     * @param PersonalData $personalData
     * @return staffs
     */
    public function setPersonalData(PersonalData $personalData)
    {
        $this->personalData = $personalData;

        return $this;
    }

    /**
     * @return PersonalData
     */
    public function getPersonalData()
    {
        return $this->personalData;
    }

    /**
     * @param User $user
     * @return Staffs
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * @param Stock $stock
     * @return Staffs
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
}
