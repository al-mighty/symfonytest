<?php


namespace MainBundle\Model;

use Doctrine\ORM\EntityManager;
use MainBundle\Entity\StoreKeeper;
use MainBundle\Entity\Storage;
use MainBundle\Entity\User;

/**
 * Class StorageModel
 * @package MainBundle\Model
 */
class ProductModel
{
    private $em;

    /**
     * StorageModel constructor.
     * @param EntityManager $em
     */
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     */
    public function createStoreKeeper(User $user)
    {
        $storage = new Storage();

        $storage->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($storage);
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

    public function getAllStorage(){
        $storageRepo = $this->em->getRepository(Storage::class);

        $allStorage = $storageRepo->findAll();

        return $allStorage;
    }

    /**
     * @param User $user
     * @return null|Storage
     */
    public function getStorage(User $user)
    {
        return $this->em->getRepository(Storage::class)->findOneBy(['user' => $user]);
    }
}