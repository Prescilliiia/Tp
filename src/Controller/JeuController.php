<?php

namespace App\Controller;

use App\Form\JeuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JeuController extends AbstractController
{
    #[Route('/jeu', name: 'app_jeu')]
    public function index(Request $request): Response
    {
        $form=$this->createForm(JeuType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data= $form->getData();   

            $data['alea']=rand(1,100);


            if ($data['alea'] == $data['nombre']){
                $data['reponse']="Gagné";
            }

             else   {
    
                $data['reponse']="Perdu";
            } 

            return $this->render('jeu/traitement.html.twig', [
                'mes_donnes'=>$data ,
            ]);
        }  

        return $this->render('jeu/index.html.twig', [
            'controller_name' => 'JeuController',
        ]);
    }
}
