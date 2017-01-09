<?php

namespace MainBundle\DataFixtures\ORM;

use MainBundle\Entity\Product;
use MainBundle\Entity\Security\Group;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Stock;
use MainBundle\Entity\Storage;
use MainBundle\Entity\Store;

class LoadStorage extends BaseLoadFixture
{
    public function load(ObjectManager $manager)
    {
        $storeRepo = $manager->getRepository(Store::class);
        $stockRepo = $manager->getRepository(Stock::class);
        $storageRepo = $manager->getRepository(Storage::class);
        $productRepo = $manager->getRepository(Product::class);

        foreach ($this->loadFromYaml('storage') as $data) {

            $storeDataArray = $this->extractArrayFrom($data, 'store');
            $data['store'] = $storeRepo->create($storeDataArray);

            $stockDataArray = $this->extractArrayFrom($data,'stock');
            $data['stock'] = $stockRepo->create($stockDataArray);

            $productDataArray = $this->extractArrayFrom($data,'product');
            $data['product'] = $productRepo->create($productDataArray);

            $this->convertDateTime($data, ['stateDate', 'createDate']);
            $storageRepo->create($data);
        }

    }

    public function getOrder()
    {
        return 3;
    }
}