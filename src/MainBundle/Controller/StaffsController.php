<?php


namespace MainBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use MainBundle\Entity\Staffs;
use Symfony\Component\HttpFoundation\RedirectResponse;
use MainBundle\C;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StaffsController
 * @package MainBundle\Controller
 */
class StaffsController extends GeneralController
{
    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function indexAction(Request $request)
    {
        $profileRoute = $this->get('auth_resolver')->getProfileRoute($request);
        $user = $this->getUser();
        $staffsModel = $this->get('model.staffs');
        $staffs = $this->get('model.staffs')->getStaffs($user);
        $userId=$user->getId();

        $stocks = $staffsModel->findCurrentStock($staffs);


        $nameStock='';
//        $staffs->getStock()->getStock()

//        $users = $this->get('model.user')->allUsersRegister();
//        foreach ($users as $user=>$item){
////            MyLogHelper::lg($user);
//            $member = $item->getGroups();
//            $member = array_shift($member);
//        }


        if (is_null($staffs)) {
            $this->addFlash(C::FLASH_ERROR, 'Невозможно загрузить личный кабинет.');

            return $this->redirectToRoute('/');
        }

        return $this->render("MainBundle:StoreKeeper:index.html.twig", [
            'profile_route' => $profileRoute,
            'stocks' => $stocks,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function productOnStorageAction(Request $request)
    {
//        $profileRoute = $this->get('auth_resolver')->getProfileRoute($request);
        $user = $this->getUser();
        $staffsModel = $this->get('model.staffs');
        $storageModel = $this->get('model.storage');

//        $staffs = $staffsModel->getStaffs($user);

        $allStorage = $storageModel->getAllStorage();


        $nameStock='';
//        $staffs->getStock()->getStock()

//        $users = $this->get('model.user')->allUsersRegister();
//        foreach ($users as $user=>$item){
////            MyLogHelper::lg($user);
//            $member = $item->getGroups();
//            $member = array_shift($member);
//        }


//        if (is_null($staffs)) {
//            $this->addFlash(C::FLASH_ERROR, 'Невозможно загрузить личный кабинет.');
//
//            return $this->redirectToRoute('/');
//        }

        return $this->render("MainBundle:StoreKeeper:storage.html.twig", [
//            'profile_route' => $profileRoute,
            'storage' => $allStorage,
        ]);
    }
}