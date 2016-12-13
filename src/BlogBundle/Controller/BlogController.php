<?php

namespace BlogBundle\Controller;


use BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    public function homepageAction()
    {
        return $this->render("::base.html.twig");
    }

    public function blogViewAction($id)
    {
        $wtf = $this->getDoctrine();
        $blogRepository = $wtf->getRepository("BlogBundle:Blog");
        $blog = $blogRepository->find($id);
//        echo "<pre>";
//        var_dump($blog);
//        echo "</pre>";
        return $this->render("BlogBundle:Blog:view.html.twig", [
            'blog' => $blog
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function blogAction(Request $request)
    {
        $em = $this->getDoctrine();
        $blogRepository = $em->getRepository("BlogBundle:Blog");
        $countTotalBlog = $blogRepository->searchAllBlogCount();

        $page = $request->query->get("page")
            && $request->get("page") > 1 ? $request->query->get("page") : 1;

        $blogsOnPage = $blogRepository->getBlog(['page' => $page]);
        $pagination = [
            "total" => $countTotalBlog,
            "page" => $page,
            "max_result" => 5,
            "url" => "blog_teaser"
        ];

        return $this->render("BlogBundle:Blog:teaser.html.twig", [
            'blogs' => $blogsOnPage,
            'pagination' => $pagination
        ]);
    }
}