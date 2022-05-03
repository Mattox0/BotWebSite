<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function index(): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        $user=$this->getUser();
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'me' => $user,
        ]);
    }
    
    // #[Route("/delete_profil", name:"delete_profil", methods:"GET")]
    // public function suppressionProfil(Request $request): Response
    // {
    //     var_dump(getUser());
    //     var_dump("HEre ");
    //     // $entityManager = $this->getDoctrine()->getManager();
    //     // $entityManager->remove($user);
    //     // $entityManager->flush();

    //     // $this->addFlash('sup', 'Votre compte a bien été supprimée');

    //     // return $this->redirectToRoute('/');
    // }

}
