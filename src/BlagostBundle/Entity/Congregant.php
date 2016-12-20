<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="congregants")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\CongregantRepository")
 */
class Congregant extends BaseEntity
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
     * @ORM\Column(type="float")
     */
    private $balance;

    /**
     * @param PersonalData $personalData
     * @return Congregant
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
     * @return Congregant
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
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param $balance
     * @return Congregant
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }
}
