<?php
/**
 * Created by PhpStorm.
 * User: progi
 * Date: 17.08.2016
 * Time: 1:00
 */

namespace BlogBundle\Controller;

use BlogBundle\Entity\Blog;
use BlogBundle\Forms\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function indexAction(){
        var_dump("admin");
        return $this->render("::base.html.twig");
    }

    public function blogAction(){
        $blogs=$this->getDoctrine()->getRepository("BlogBundle:Blog")->findAll();
        return $this->render("BlogBundle:Admin:blog-view.html.twig",[
            "blogs"=>$blogs
        ]);
//        return new Response("here");
    }

    public function blogEditAction($id,Request $request){
        $em=$this->getDoctrine();
        $blog=$em->getRepository("BlogBundle:Blog")->find($id);
        if(!$blog){
            throw $this->createAccessDeniedException('you cannot access this page');
        }
        $form=$this->createForm(FormType::class,$blog);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($blog);
            $em->flush();
            return $this->redirectToRoute('admin_blog');
        }
        return $this->render("BlogBundle:Admin:blog-edit.html.twig",[
            "form_edit_blog"=>$form->createView()
        ]);
    }

    public function blogAddAction(Request $request){
        $blog=new Blog();
        $form=$this->createForm(FormType::class,$blog);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($blog);
            $em->flush();
            return $this->redirectToRoute('admin_blog');
        }
        return $this->render("BlogBundle:Admin:blog-add.html.twig",[
            "form_add_blog"=>$form->createView()
        ]);
    }
}