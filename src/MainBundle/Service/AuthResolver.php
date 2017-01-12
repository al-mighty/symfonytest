<?php

namespace MainBundle\Service;

use MainBundle\Entity\Security\Group;
use MainBundle\Entity\User;
use MainBundle\Exception\ProjectException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

/**
 * Class AuthResolver
 * @package MainBundle\Service
 */
class AuthResolver
{
    private $container;
    private $em;
    private $router;

    /**
     * AuthResolver constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container, Router $router)
    {
        $this->container = $container;
        $this->router = $router;
        $this->em = $this->container->get('doctrine.orm.entity_manager');
    }

    /**
     * @param Request $request
     * @return string
     * @throws ProjectException
     */
    public function getDefaultRoute(Request $request)
    {
       $group = $this->getCurrentGroup($request);

        if ($group) {
            $route = $group . "_index";

            try {
                $url = $this->router->generate($route);
            } catch (\Exception $e) {
                throw new ProjectException(
                    sprintf(
                        'Default route for group "%s" has not been implemented yet.',
                        $group
                    )
                );
            }
        } else {
            $route = 'default';
        }
        
        return $route;
    }
    
    public function getProfileRoute(Request $request)
    {
        return str_replace('index', 'profile', $this->getDefaultRoute($request));
    }

    /**
     * @param Request $request
     * @param $group
     * @return mixed
     */
    public function setCurrentGroup(Request $request, $group)
    {
        return $request->getSession()->set('currentGroup', $group);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getCurrentGroup(Request $request)
    {
        return $request->getSession()->get('currentGroup');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function setCurrentUser(Request $request, User $user)
    {
        return $request->getSession()->set('currentUserId', $user->getId());
    }

    /**
     * @param Request $request
     * @return User|null
     */
    public function getCurrentUser(Request $request)
    {
        return ($id = $request->getSession()->get('currentUserId'))
            ? $this->em->find(User::class, $id)
            : null;
    }
}
