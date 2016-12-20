<?php

namespace BlagostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package BlagostBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function headerAction()
    {
        return $this->render('BlagostBundle:Layout:header.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('BlagostBundle:Default:index.html.twig');
    }
}
