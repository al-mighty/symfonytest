<?php


namespace MainBundle\Controller;

use MainBundle\C;
use MainBundle\Form\CreateStorage;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StoreKeeperController
 * @package MainBundle\Controller
 */
class StoreKeeperController extends GeneralController
{
    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function indexAction(Request $request)
    {
//        $profileRoute = $this->get('auth_resolver')->getProfileRoute($request);
        $user = $this->getUser();
        $storeKeeperModel = $this->get('model.store_keeper');
        $storeKeeper =$storeKeeperModel->getStoreKeeper($user);
        $userId=$user->getId();

        $stocks = $storeKeeperModel->findCurrentStock($storeKeeper);


        $nameStock='';
//        $storeKeeper->getStock()->getStock()

//        $users = $this->get('model.user')->allUsersRegister();
//        foreach ($users as $user=>$item){
////            MyLogHelper::lg($user);
//            $member = $item->getGroups();
//            $member = array_shift($member);
//        }


        if (is_null($storeKeeper)) {
            $this->addFlash(C::FLASH_ERROR, 'Невозможно загрузить личный кабинет.');

            return $this->redirectToRoute('/');
        }

        return $this->render("MainBundle:StoreKeeper:index.html.twig", [
//            'profile_route' => $profileRoute,
            'stocks' => $stocks,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function productOnStorageAction(Request $request)
    {
        $profileRoute = $this->get('auth_resolver')->getProfileRoute($request);
        $user = $this->getUser();
        $storeKeeperModel = $this->get('model.store_keeper');
        $storageModel = $this->get('model.storage');

//        $staffs = $storeKeeperModel->getStaffs($user);

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

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createStorageAction(Request $request)
    {
//        $services = $this->get('model.storage')->getActiveServicesArray();

        $user = $this->getUser();
        $storeKeeperModel = $this->get('model.store_keeper');
        $storeKeepers =$storeKeeperModel->getStoreKeeper($user);

        //Список Складов
        $listStock = $storeKeepers->getStock()->getId();

        $storeModel = $this->get('model.store');

        $allStore = $storeModel->getAllStore();


//        $stock = $this->get('model.stock')->getActiveServicesArray();
//        $store = $this->get('model.store')->getActiveTemplesArray();
//



//        $form = $this->createForm(CreateStorage::class,
//                                    null,
//                                    [
//                                        'store' => $allStore,
//                                        'stock' => $listStock
//                                    ]
//        );



//        $form->handleRequest($request);
//
//        if ($form->isSubmitted()) {
//            if ($form->isValid()) {
//                $data = $form->getData();
//
//                try {
//                    // TODO: Use $groupId to create link
//                    $groupId = $this->get('model.order')->createOrdersGroupFromForm(
//                        $this->getUser(),
//                        Congregant::class,
//                        $data
//                    );
//
//                    $this->addFlash(C::FLASH_SUCCESS, 'Ваш заказ создан и находится в разделе "Мои заказы".');
//                } catch (\Exception $e) {
//                    $this->addFlash(C::FLASH_ERROR, 'В процессе оформления заказа возникла ошибка.');
//                    $this->addFlash(C::FLASH_ERROR, $e->getMessage()); // TODO: delete!
//                }
//            } else {
//                $this->addFlash(C::FLASH_ERROR, 'Проверьте правильность ввода данных!');
//            }
//
//            return $this->redirectToRoute('worker_create_storage_index');
//        }

        return $this->render("MainBundle:StoreKeeper:createStorage.html.twig", [
//            'form' => $form->createView()
        ]);
    }
}