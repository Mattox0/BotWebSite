<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class ModifyProfilController extends AbstractController
{
    #[Route('/edit_profil', name: 'edit_profil')]
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $manager): Response
    {
        $user=$this->getUser();

        $form = $this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $manager->persist($user);
            $manager->flush();
            $this->addFlash(
                'success',
                'Les informations de votre compte ont bien été modifiées. '
            );

            return $this->redirectToRoute('profil');
        }

        return $this->render('profil/editProfil.html.twig', [
            'me' => $user,
            'editForm' => $form->createView(),
        ]);
    }
}
