<?php

namespace BlagostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlagostBundle\C;
use BlagostBundle\Entity\PersonalData;
use BlagostBundle\Form\PersonalDataType;
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

        if (empty($personalData)) {
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

        return $this->render("BlagostBundle:{$group}:profile.html.twig", [
            'form' => $form->createView()
        ]);
    }
}
