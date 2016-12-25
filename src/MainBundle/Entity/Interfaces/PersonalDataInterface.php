<?php

namespace MainBundle\Entity\Interfaces;

use MainBundle\Entity\PersonalData;

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
