<?php

namespace MainBundle\Model;

use MainBundle\Entity\Interfaces\PersonalDataInterface;
use MainBundle\Entity\PersonalData;
use MainBundle\Entity\User;
use MainBundle\Exception\ProjectException;
use Doctrine\ORM\EntityManager;

/**
 * Class PersonalDataModel
 * @package MainBundle\Model
 */
class PersonalDataModel
{
    private $em;

    /**
     * PersonalDataModel constructor.
     * @param EntityManager $em
     */
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     * @param $entityClassName
     * @return PersonalData|null
     */
    public function getPersonalData(User $user, $entityClassName)
    {
        $fullClassName = "MainBundle\\Entity\\{$entityClassName}";
        $this->checkInterfaceImplemented($fullClassName);
        $entity = $this->em->getRepository($fullClassName)->findOneBy(['user' => $user]);

        return $entity->getPersonalData();
    }

    /**
     * @param PersonalData $personalData
     * @param User $user
     * @param $entityClassName
     * @throws ProjectException
     * @throws \Doctrine\DBAL\ConnectionException
     */
    public function saveFromForm(PersonalData $personalData, User $user, $entityClassName)
    {
        $fullClassName = "MainBundle\\Entity\\{$entityClassName}";
        $this->checkInterfaceImplemented($fullClassName);
        $this->em->getConnection()->beginTransaction();
        
        try {
            $this->em->persist($personalData);
            $entity = $this->em->getRepository($fullClassName)->findOneBy(['user' => $user]);

            if (!$entity->getPersonalData()) {
                $entity->setPersonalData($personalData);
            }

            $this->em->flush();
            $this->em->getConnection()->commit();
        } catch (\Exception $e) {
            $this->em->getConnection()->rollback();
            throw new ProjectException('Could not save personal data');
        }
    }

    /**
     * @param $class
     * @throws ProjectException
     */
    private function checkInterfaceImplemented($class)
    {
        if (!in_array(PersonalDataInterface::class, class_implements($class))) {
            throw new ProjectException(sprintf(
                "Class %s does not implement interface %s",
                $class,
                PersonalDataInterface::class
            ));
        }
    }
}