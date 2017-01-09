<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="personal_data")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\PersonalDataRepository")
 */
class PersonalData extends BaseEntity
{
    /**
     * @ORM\Column(name="first_name", type="string", length=45)
     */
    private $firstName;

    /**
     * @ORM\Column(name="middle_name", type="string", length=45, nullable=true)
     */
    private $middleName;

    /**
     * @ORM\Column(name="last_name", type="string", length=45)
     */
    private $lastName;

    /**
     * @ORM\Column(name="phone_number", type="string", length=45)
     */
    private $phoneNumber;

    /**
     * @param $firstName
     * @return PersonalData
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $lastName
     * @return PersonalData
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $middleName
     * @return PersonalData
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return string | null
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param $phoneNumber
     * @return PersonalData
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
