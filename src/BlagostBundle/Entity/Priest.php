<?php

namespace BlagostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlagostBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="priests")
 * @ORM\Entity(repositoryClass="BlagostBundle\Repository\PriestRepository")
 */
class Priest extends BaseEntity
{
    use StateDateTrait;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Temple")
     * @ORM\JoinColumn(name="temple_id", referencedColumnName="id")
     */
    private $temple;

    /**
     * @ORM\ManyToOne(targetEntity="PersonalData")
     * @ORM\JoinColumn(name="personal_data_id", referencedColumnName="id")
     */
    private $personalData;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Priest
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Temple
     */
    public function getTemple()
    {
        return $this->temple;
    }

    /**
     * @param Temple $temple
     * @return Priest
     */
    public function setTemple(Temple $temple)
    {
        $this->temple = $temple;

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
     * @param PersonalData $personalData
     * @return $this
     */
    public function setPersonalData(PersonalData $personalData)
    {
        $this->personalData = $personalData;

        return $this;
    }
}
