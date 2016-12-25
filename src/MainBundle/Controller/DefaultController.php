<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template("MainBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        $tmp = "noob";
        return [
            'tmp' => $tmp
        ];
    }
}
