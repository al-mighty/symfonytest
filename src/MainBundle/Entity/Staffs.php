<?php

namespace MainBundle\Entity;

use MainBundle\Entity\Interfaces\PersonalDataInterface;
use Doctrine\ORM\Mapping as ORM;
use MainBundle\Entity\Traits\StateDateTrait;

/**
 * @ORM\Table(name="staffs")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\StaffsRepository")
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
     * @ORM\ManyToOne(targetEntity="Storage")
* @ORM\JoinColumn(name="staff_storages_id", referencedColumnName="id")
*/
    private $staffStoragesId;

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
     * Set staffStoragesId
     *
     * @param \MainBundle\Entity\Storage $staffStoragesId
     *
     * @return Staffs
     */
    public function setStaffStoragesId(\MainBundle\Entity\Storage $staffStoragesId = null)
    {
        $this->staffStoragesId = $staffStoragesId;

        return $this;
    }

    /**
     * Get staffStoragesId
     *
     * @return \MainBundle\Entity\Storage
     */
    public function getStaffStoragesId()
    {
        return $this->staffStoragesId;
    }
}
