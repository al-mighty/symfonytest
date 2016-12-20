<?php

namespace BlogBundle\Controller;

use BlogBundle\Exception\InvalidLoginException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use BlogBundle\Form\Security\RegistrationType;
use BlogBundle\Form\Security\ForgotPasswordType;
use BlogBundle\C;

/**
 * Class SecurityController
 * @package BlogBundle\Controller
 */
class SecurityController extends GeneralController
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

        return $this->render('BlogBundle:Security:registration.html.twig', [
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

        return $this->render('BlogBundle:Security:login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function forgotPasswordAction(Request $request)
    {
        $form = $this->createForm(ForgotPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $data = $form->getData();

                try {
                    $this->get('model.security')->updateUserPassword($data['phone_number']);
                    $this->addFlash(C::FLASH_SUCCESS, 'Новый пароль был выслан вам по СМС.');
                } catch (\Exception $e) {
                    $message = ($e instanceof InvalidLoginException)
                        ? $e->getMessage()
                        : "Произошла ошибка. Сообщение не отправлено.";
                    $this->addFlash(C::FLASH_ERROR, $message);
                }
            } else {
                $this->addFlash(C::FLASH_ERROR, 'Проверьте правильность заполнения формы!');
            }
        }

        return $this->render('BlogBundle:Security:forgotPassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
