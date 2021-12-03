<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormModifController extends AbstractController
{
    /**
     * @Route("/form/modif", name="form_modif")
     */
    public function index(): Response
    {
        return $this->render('form_modif/index.html.twig', [
            'controller_name' => 'FormModifController',
        ]);
    }
}
