<?php


namespace MainBundle\Model;

use Doctrine\ORM\EntityManager;
use MainBundle\Entity\StoreKeeper;
use MainBundle\Entity\Storage;
use MainBundle\Entity\Store;
use MainBundle\Entity\User;

/**
 * Class StorageModel
 * @package MainBundle\Model
 */
class StoreModel
{
    private $em;

    /**
     * StoreModel constructor.
     * @param EntityManager $em
     */
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     */
    public function createStore(User $user)
    {
        $store = new Store();

        $store->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($store);
        $this->em->flush();
    }

//    /**
//     * @param $userId
//     * @return array|Staffs[]
//     */
//    public function findCurrentStock($userId){
//        $allStock = $this->em->getRepository(Staffs::class)->findBy(['user'=>$userId->getUser()]);
//        $arrayStocks =[];
//        $arrayStocks2 =[];
//        foreach ($allStock as $item){
//            $arrayStocks[] = $item->getStock();
//            $arrayStocks2[] = $item->getStock()->getStock();
//        }
//
//        return $arrayStocks;
//    }

    public function getAllStore(){
        $storeRepo = $this->em->getRepository(Store::class);

        $allStore = $storeRepo->findAll();

        return $allStore;
    }

    /**
     * @param User $user
     * @return Storage|null|object
     */
    public function getStore(User $user)
    {
        return $this->em->getRepository(Store::class)->findOneBy(['user' => $user]);
    }
}