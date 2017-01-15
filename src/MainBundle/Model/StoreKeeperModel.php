<?php


namespace MainBundle\Model;

use Doctrine\ORM\EntityManager;
use MainBundle\Entity\Store;
use MainBundle\Entity\StoreKeeper;
use MainBundle\Entity\User;

/**
 * Class StoreKeeperModel
 * @package MainBundle\Model
 */
class StoreKeeperModel
{
    private $em;

    /**
     * StoreKeeperModel constructor.
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
        $storeKeeper = new StoreKeeper();

        $storeKeeper->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($storeKeeper);
        $this->em->flush();
    }

    /**
     * @param $userId
     * @return array|StoreKeeper[]
     */
    public function findCurrentStock($userId){
        $allStock = $this->em->getRepository(StoreKeeper::class)->findBy(['user'=>$userId->getUser()]);
        $arrayStocks =[];
        $arrayStocks2 =[];
        foreach ($allStock as $item){
            $arrayStocks[] = $item->getStock();
            $arrayStocks2[] = $item->getStock()->getStock();
        }

        return $arrayStocks;
    }

    /**
     * @param User $user
     * @return StoreKeeper|null|object
     */
    public function getStoreKeeper(User $user)
    {
        return $this->em->getRepository(StoreKeeper::class)->findOneBy(['user' => $user]);
    }
}