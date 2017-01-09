<?php


namespace MainBundle\Model;

use Doctrine\ORM\EntityManager;
use MainBundle\Entity\Staffs;
use MainBundle\Entity\User;

/**
 * Class StaffsModel
 * @package MainBundle\Model
 */
class StaffsModel
{
    private $em;

    /**
     * StaffsModel constructor.
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
        $Members = new Staffs();

        $Members->setParams([
            'user' => $user,
            'balance' => '0.00',
            'state' => 'active',
            'stateDate' => new \DateTime(),
            'createDate' => new \DateTime()
        ]);

        $this->em->persist($Members);
        $this->em->flush();
    }

    /**
     * @param $userId
     * @return array|Staffs[]
     */
    public function findCurrentStock($userId){
        $allStock = $this->em->getRepository(Staffs::class)->findBy(['user'=>$userId->getUser()]);
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
     * @return null|Staffs
     */
    public function getStaffs(User $user)
    {
        return $this->em->getRepository(Staffs::class)->findOneBy(['user' => $user]);
    }
}