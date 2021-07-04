<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassifiedsController extends AbstractController
{
    /**
     * @Route("/classifieds", name="classifieds")
     */
    public function index(): Response
    {
        return $this->render('classifieds/index.html.twig', [
            'controller_name' => 'ClassifiedsController',
        ]);
    }
}
