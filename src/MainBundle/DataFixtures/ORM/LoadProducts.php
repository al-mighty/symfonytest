<?php

namespace MainBundle\DataFixtures\ORM;

use MainBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectManager;


class LoadProducts extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $productRepo = $manager->getRepository(Product::class);

        foreach ($this->loadFromYaml('products') as $data) {

//            $productDataArray = $this->extractArrayFrom($data,'product');
            //$data['product'] = $productRepo->create($productDataArray);
//            $data['product'] = $productDataArray;
            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $productRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 4;
    }
}