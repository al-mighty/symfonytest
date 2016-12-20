<?php

namespace BlagostBundle\Listener;

use BlagostBundle\Entity\Security\Group;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class KernelRequestListener
 * @package BlagostBundle\Listener
 */
class KernelRequestListener
{
    private $container;

    /**
     * KernelRequestListener constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function checkPdProcessingAccepted(GetResponseEvent $event)
    {
        $acceptRoute = 'accept_pd_processing';
        $route = $event->getRequest()->get('_route');

        if (preg_match('/^(congregant|priest)/', $route)
            && $route != $acceptRoute
            && ($user = $this->container->get('auth_resolver')->getCurrentUser($event->getRequest()))
            && !$user->isPdProcessingAccepted())
        {
            $event->setResponse(new RedirectResponse($this->container->get('router')->generate($acceptRoute)));
        }
    }
}
