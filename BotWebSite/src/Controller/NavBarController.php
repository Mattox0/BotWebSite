<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavBarController extends AbstractController
{
    #[Route('/nav/bar', name: 'nav_bar')]
    public function index(): Response
    {
        $user = $this->getUser();
        if ($user != null){
            $name = $user->getUsername(); 
        }else{
            $name = "";
        }
        $test = "bleu";
        return $this->render('nav_bar/navBar.html.twig', [
            'controller_name' => 'NavBarController',
            'name' => $name,
            "test" => $test,
        ]);
    }
}
