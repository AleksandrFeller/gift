<?php

namespace App\Controller\Index;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\Slugger;

class Controller extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Slugger $slugger): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Index/Controller.php',
            'Slug' => $slugger->slug('Привет !!! Ура % ertertert11111 gffhfg пр вап')
        ]);
    }
}
