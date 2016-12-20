<?php

namespace StuntBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use StuntBundle\C;

/**
 * Class UserController
 * @package StuntBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return Response|RedirectResponse
     */
    public function acceptPdProcessingAction(Request $request)
    {
        if (!$request->getSession()->get('currentUserId')) {
            return $this->redirectToRoute('default');
        }

        if ($request->isMethod('POST')) {
            if ($request->request->get('accept') === "1") {
                $this->get('model.user')->doAcceptPdProcessing($this->getUser());

                $this->addFlash(
                    C::FLASH_SUCCESS,
                    'Вы успешно приняли соглашение и можете продолжить работу с личным кабинетом.'
                );

                $profileRoute = $this->get('auth_resolver')->getDefaultRoute($request);

                return $this->redirectToRoute($profileRoute);
            } else {
                $this->addFlash(C::FLASH_ERROR, 'Для продолжения работы с системой необходимо согласиться.');

                return $this->redirectToRoute('accept_pd_processing');
            }
        }
        
        return $this->render("StuntBundle:User:acceptPdProcessing.html.twig");
    }
}
