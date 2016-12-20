<?php

namespace BlagostBundle\Entity\Interfaces;

use BlagostBundle\Entity\PersonalData;

interface PersonalDataInterface
{
    /**
     * @return PersonalData
     */
    public function getPersonalData();

    /**
     * @param PersonalData $personalData
     * @return mixed
     */
    public function setPersonalData(PersonalData $personalData);
}
