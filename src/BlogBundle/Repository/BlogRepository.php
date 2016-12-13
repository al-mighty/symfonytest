<?php

namespace BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class BlogRepository
 * @package BlogBundle\Repository
 */
class BlogRepository extends EntityRepository
{

    /**
     * @return mixed
     */
    public function searchAllBlogCount()
    {
        $query = $this->createQueryBuilder("b");
        $query->select("count(b)");
        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * @param array $context
     * @return array
     */
    public function getBlog(array $context = [])
    {
        $query = $this->createQueryBuilder("b");
//        page==2=5*n=10 где N номер страницы
        $query->select("b")->setMaxResults(5)->orderBy("b.id", "DESC");
        $page = 0;
        if (isset($context["page"]) && is_numeric($context["page"]) && $context["page"] > 1) {
            $page = 5 * ($context["page"] - 1);
        }
        $query->setFirstResult($page);
        return $query->getQuery()->getResult();
    }
}