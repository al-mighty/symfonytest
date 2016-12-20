<?php

namespace StuntBundle\Security\Authentication;

use StuntBundle\Exception\ProjectException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

/**
 * Class AuthenticationHandler
 * @package StuntBundle\Security\Authentication
 */
class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, LogoutSuccessHandlerInterface
{
    private $router;
    private $container;

    public function __construct(Router $router, ContainerInterface $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     * @throws ProjectException
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $resolver = $this->container->get('auth_resolver');
        $user = $token->getUser();
        $groups = $user->getGroups();

        if (count($groups) === 0) {
            throw new ProjectException('User has no groups');
        }

        if (count($groups) > 1) {
            // Такого не должно быть.
            // Если все-таки будет, то здесь поместить редирект на страницу выбора группы,
            // под которой пользователь хочет авторизоваться.
        }

        $group = $groups[0];
        $resolver->setCurrentGroup($request, $group);
        $resolver->setCurrentUser($request, $user);
        $route = $resolver->getDefaultRoute($request);

        return new RedirectResponse($this->router->generate($route));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {
        $request->getSession()->clear();

        return new RedirectResponse($this->router->generate('default'));
    }
}
