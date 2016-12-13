<?php

/**
 * Created by PhpStorm.
 * User: progi
 * Date: 21.08.2016
 * Time: 23:46
 */

namespace BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class BlogRepository
 * @package BlogBundle\Repository
 */
class BlogRepository extends EntityRepository
{
    public function searchAllBlogCount(){
        $query=$this->createQueryBuilder("b");
        $query->select("count(b)");
        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * @param array $context
     * @return array
     */
    public function getBlog(array $context = []){
        $q=$this->createQueryBuilder("b");
//        page==2=5*n=10 где N номер страницы
        $page=0;
        if(isset($context["page"])&& is_numeric($context["page"]) && $context["page"]>1){
            $page=2* ($context["page"]-1);
        }
        $q->select("b")->setMaxResults(2)->orderBy("b.id","DESC")->setFirstResult($page);
        return $q->getQuery()->getResult();
    }
}