<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        };
        return $this->render('site/home.html.twig', [
            'title' => "LMT-Bot",
        ]);
    }
}
