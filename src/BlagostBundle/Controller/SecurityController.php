<?php

namespace BlagostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use BlagostBundle\Form\Security\RegistrationType;
use BlagostBundle\C;

/**
 * Class SecurityController
 * @package BlagostBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function registrationAction(Request $request)
    {
        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            try {
                $this->get('model.security')->createUser(
                    $formData['login'],
                    $formData['password'],
                    $formData['email']
                );

                $this->addFlash(C::FLASH_SUCCESS, 'Вы успешно зарегистрированы в системе!');

                return $this->redirectToRoute('default');
            } catch (\Exception $e) {
                $this->addFlash(C::FLASH_ERROR, 'Произошла ошибка!');
            }
        } elseif ($form->isSubmitted()) {
            $this->addFlash(C::FLASH_ERROR, 'Проверьте правильность заполнения формы!');
        }

        return $this->render('BlagostBundle:Security:registration.html.twig', [
                'form' => $form->createView(),
            ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('BlagostBundle:Security:login.html.twig', [
                'last_username' => $lastUsername,
                'error'         => $error,
            ]);
    }
}
