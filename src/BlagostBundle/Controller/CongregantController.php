<?php

namespace BlagostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CongregantController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render("BlagostBundle:Congregant:index.html.twig");
    }
}
