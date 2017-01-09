<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MainBundle\C;
use MainBundle\Entity\PersonalData;
use MainBundle\Form\PersonalDataType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneralController extends Controller
{
    /**
     * @param Request $request
     * @return Response|RedirectResponse
     */
    public function profileAction(Request $request)
    {
        $group = ucfirst($request->getSession()->get('currentGroup'));
        $personalData = $this->get('model.personal_data')->getPersonalData($this->getUser(), $group);

        if (is_null($personalData)) {
            $personalData = new PersonalData();
        }

        $form = $this->createForm(PersonalDataType::class, $personalData);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $this->get('model.personal_data')->saveFromForm($personalData, $this->getUser(), $group);
                    $this->addFlash(C::FLASH_SUCCESS, 'Данные успешно сохранены.');
                } catch (\Exception $e) {
                    $this->addFlash(C::FLASH_ERROR, 'Данные не были сохранены.');
                }
            } else {
                $this->addFlash(C::FLASH_ERROR, 'Пожалуйста, проверьте правильность ввода данных.');
            }

            return $this->redirectToRoute($this->get('auth_resolver')->getProfileRoute($request));
        }

        return $this->render("MainBundle:{$group}:profile.html.twig", [
            'form' => $form->createView()
        ]);
    }
}
