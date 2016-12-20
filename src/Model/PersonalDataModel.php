<?php

namespace BlogBundle\Model;

use BlogBundle\Entity\Interfaces\PersonalDataInterface;
use BlogBundle\Entity\PersonalData;
use BlogBundle\Entity\User;
use BlogBundle\Exception\ProjectException;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class PersonalDataModel
 * @package BlogBundle\Model
 */
class PersonalDataModel
{
    private $em;
    private $container;

    /**
     * PersonalDataModel constructor.
     * @param EntityManager $em
     * @param Container $container
     */
    public function  __construct(EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * @param User $user
     * @param $entityClassName
     * @return PersonalData|null
     */
    public function getPersonalData(User $user, $entityClassName)
    {
        $fullClassName = "BlogBundle\\Entity\\{$entityClassName}";
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
        $fullClassName = "BlogBundle\\Entity\\{$entityClassName}";
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