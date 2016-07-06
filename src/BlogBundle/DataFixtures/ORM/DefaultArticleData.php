<?php

/**
 * Created by PhpStorm.
 * User: progi
 * Date: 05.07.2016
 * Time: 11:30
 */

namespace BlogBundle\DataFixtures\ORM;

use BlogBundle\Entity\Blog;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DefaultArticleData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $blog=new Blog();
        $blog->setTitle("Second title");
        $blog->setBody("<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>");
        $blog->setSummary("Lorem ipsum dolor sit amet,");
        $manager->persist($blog);
        $blog=new Blog();
        $blog->setTitle("third title");
        $blog->setBody("<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>");
        $blog->setSummary("Lorem ipsum dolor sit amet,");
        $manager->persist($blog);
        $blog=new Blog();
        $blog->setTitle("fourth title");
        $blog->setBody("<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>");
        $blog->setSummary("Lorem ipsum dolor sit amet,");
        $manager->persist($blog);
        $blog=new Blog();
        $blog->setTitle("fifth title");
        $blog->setBody("<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>");
        $blog->setSummary("Lorem ipsum dolor sit amet,");
        $manager->persist($blog);
        $blog=new Blog();
        $blog->setTitle("sixth title");
        $blog->setBody("<p> consectetur adipisicing elit. Aperiam consequuntur deleniti .</p>");
        $blog->setSummary("Lorem ipsum dolor sit amet,");
        $manager->persist($blog);

        $manager->flush();
//        для одной php bin/console doctrine:fixtures:load
//        для нескольких bin/console doctrine:fixtures:load --append
    }
}

