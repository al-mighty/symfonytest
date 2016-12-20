<?php

namespace StuntBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package StuntBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function headerAction()
    {
        return $this->render('StuntBundle:Layout:header.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('StuntBundle:Default:index.html.twig');
    }
}
