<?php

namespace MainBundle\Listener;

use MainBundle\Entity\Security\Group;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class KernelRequestListener
 * @package MainBundle\Listener
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
        $user = $this->container->get('auth_resolver')->getCurrentUser($event->getRequest());

        if (!is_null($user)) {
            $accepted = $user->isPdProcessingAccepted();

            // Same user cannot accept offer twice.
            if ($accepted && $route === $acceptRoute) {
                $event->setResponse(new RedirectResponse($this->container->get('router')->generate('default')));
            }

            if (preg_match('/^(Admin|priest)/', $route) && $route !== $acceptRoute && !$accepted)
            {
                $event->setResponse(new RedirectResponse($this->container->get('router')->generate($acceptRoute)));
            }
        }
    }
}
