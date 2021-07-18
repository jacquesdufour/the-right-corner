<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request,ClassifiedsRepository $classifiedsRepository): Response
    {
        $search = $request->query->get('search_query', '');

        if (empty($search)) {
            return $this->redirectToRoute('home');
        }

        $classifieds = $classifiedsRepository->findBySearch($search);

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
}
