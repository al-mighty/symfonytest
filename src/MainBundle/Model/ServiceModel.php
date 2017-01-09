<?php

namespace MainBundle\Model;

use MainBundle\Entity\Service;
use Doctrine\ORM\EntityManager;

/**
 * Class ServiceModel
 * @package MainBundle\Model
 */
class ServiceModel
{
    private $em;

    /**
     * ServiceModel constructor.
     * @param EntityManager $em
     */
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return Service[]
     */
    public function getActiveServices()
    {
        return $this->em->getRepository(Service::class)->findBy(['state' => Service::STATE_ACTIVE]);
    }

    /**
     * @return array of elements [service_name => service_id]
     */
    public function getActiveServicesArray()
    {
        $services = $this->getActiveServices();
        $ret = [];

        if (!empty($services)) {
            foreach($services as $service) {
                $ret[$service->getName()] = $service->getId();
            }
        }
        
        return $ret;
    }

    /**
     * @param $id
     * @return null|Service
     */
    public function getServiceById($id)
    {
        return $this->em->getRepository(Service::class)->find($id);
    }
}
