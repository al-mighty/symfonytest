<?php
/**
 * Created by PhpStorm.
 * User: progi
 * Date: 07.07.2016
 * Time: 1:01
 */

namespace BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function aboutUsAction()
    {
        return $this->render("BlogBundle::about_us.html.twig");
    }
}