<?php

namespace StuntBundle\Service;

use StuntBundle\Entity\Security\Group;
use StuntBundle\Entity\User;
use StuntBundle\Exception\ProjectException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AuthResolver
 * @package StuntBundle\Service
 */
class AuthResolver
{
    private $container;
    private $em;

    /**
     * AuthResolver constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
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
            switch ($group) {
                case Group::GROUP_CONGREGANT:
                    $route = 'congregant_index';
                    break;
                default:
                    throw new ProjectException(
                        sprintf(
                            'Default route for group %s has not been implemented yet.',
                            $group
                        )
                    );
            }
        } else {
            $route = 'default';
        }
        
        return $route;
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
