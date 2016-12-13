<?php
/**
 * Created by PhpStorm.
 * User: progi
 * Date: 05.07.2016
 * Time: 10:06
 */

namespace BlogBundle\Controller;


use BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

    public function homepageAction(){
        return $this->render("::base.html.twig");
    }

    public function blogViewAction($id)
    {
        $wtf=$this->getDoctrine();
        $blogRepository=$wtf->getRepository("BlogBundle:Blog");
        $blog=$blogRepository->find($id);
//        echo "<pre>";
//        var_dump($blog);
//        echo "</pre>";
        return $this->render("BlogBundle:Blog:view.html.twig",[
            'blog'=>$blog
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function teaserAction()
    {
        $wtf=$this->getDoctrine();
        $teaserRepository=$wtf->getRepository(Blog::class);
        var_export(get_class($teaserRepository));
        //$totalBlog=$teaserRepository->searchAllBlogCount();
        //var_dump($totalBlog);
//        $teasers=$teaserRepository->getBlog(['page'=>2]);
        //var_dump($totalBlog);
//        $teasers=$teaserRepository->findAll();
        return $this->render("BlogBundle:Blog:teaser.html.twig",[
            'teasers'=>null
        ]);
    }
}