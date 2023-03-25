<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(MailerInterface $mailer): Response

    {

        

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',


            $tab_identite = [
                "nom" => "DIJOUX",
                "prenom" => "Prescillia",
                "age" => "30"
            ]


        ]);

        return $this->render('home/index.html.twig', [
            'identité' => $tab_identite,
        ]);
    }
}
