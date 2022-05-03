<?php

namespace App\Controller;

use App\Repository\CommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandsController extends AbstractController {
    
    #[Route('/commands', name: 'app_commands')]
    public function index(CommandRepository $commands) : Response {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        $commands = $commands->findAll();
        return $this->render("site/commands.html.twig", [
            'commands' => $commands,
        ]);
    }
}