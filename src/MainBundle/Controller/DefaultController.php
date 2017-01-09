<?php

namespace MainBundle\Controller;

use MainBundle\Controller\GeneralController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends GeneralController
{
//    /**
//     * @Route("/")
//     * @Template("MainBundle:Default:index.html.twig")
//     */
//    public function indexAction()
//    {
//        $tmp = "noob";
//        return [
//            'tmp' => $tmp
//        ];
//    }

    /**
     * @return Response
     */
    public function headerAction()
    {
        return $this->render('MainBundle:Layout:header.html.twig');
    }

    public function navbarAction(Request $request)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $defaultRoute = $this->get('auth_resolver')->getDefaultRoute($request);
        }

        return $this->render('MainBundle:Layout:navbar.html.twig', [
            'default_route' => isset($defaultRoute) ? $defaultRoute : 'default'
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('MainBundle:Default:index.html.twig');
    }
}
