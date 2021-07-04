<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassifiesdsController extends AbstractController
{
    /**
     * @Route("/classifiesds", name="classifiesds")
     */
    public function index(): Response
    {
        return $this->render('classifiesds/index.html.twig', [
            'controller_name' => 'ClassifiesdsController',
        ]);
    }
}
