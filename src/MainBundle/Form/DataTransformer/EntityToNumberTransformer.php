<?php

namespace MainBundle\Form\DataTransformer;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EntityToNumberTransformer implements DataTransformerInterface
{
    private $manager;
    private $entityClassName;

    /**
     * EntityToNumberTransformer constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager, $entityClassName)
    {
        $this->manager = $manager;
        $this->entityClassName = $entityClassName;
    }

    /**
     * Transforms an object (entity) to a string (number).
     *
     * @param  object|null $entity
     * @return string
     */
    public function transform($entity)
    {
        if (null === $entity) {
            return '';
        }

        return $entity->getId();
    }

    /**
     * Transforms a string (number) to an object (entity).
     *
     * @param  string $entityNumber
     * @return object|null
     * @throws TransformationFailedException if object (entity) is not found.
     */
    public function reverseTransform($entityNumber)
    {
        // no entity number? It's optional, so that's ok
        if (!$entityNumber) {
            return;
        }

        $entity = $this->manager
            ->getRepository($this->entityClassName)
            // query for the entity with this id
            ->find($entityNumber)
        ;

        if (null === $entity) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An object of class %s with number "%s" does not exist!',
                $this->entityClassName,
                $entityNumber
            ));
        }

        return $entity;
    }
}
