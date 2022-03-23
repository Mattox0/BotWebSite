<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandsController extends AbstractController{
    
    #[Route('/commands', name: 'app_commands')]
    public function index() : Response {
        return $this->render("site/commands.html.twig");
    }
}