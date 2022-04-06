<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifyProfilController extends AbstractController
{
    #[Route('/modify_profil', name: 'modify_profil')]
    public function index(): Response
    {
        $user=$this->getUser();
        return $this->render('modify_profil/index.html.twig', [
            'controller_name' => 'ModifyProfilController',
            'me' => $user,
        ]);
    }
}
