<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandsController extends AbstractController{
    
    #[Route('/commands', name: 'app_commands')]
    public function index() : Response {
        $filedata = file_get_contents('./commands.json');
        $details = json_decode($filedata);
        // var_dump($details);

        return $this->render("site/commands.html.twig", [
            // 'details' => $details,
        ]);
    }
}