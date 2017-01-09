<?php

namespace MainBundle\Entity;

use MainBundle\Entity\Interfaces\PersonalDataInterface;
use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="members")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\MembersRepository")
 */
class Members extends BaseEntity implements PersonalDataInterface
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
     * @return Members
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
     * @return Members
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
     * @return Members
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }
}
