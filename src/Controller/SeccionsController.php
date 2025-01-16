<?php

namespace App\Controller;

use App\Service\ServeiDadesSeccio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeccionsController extends AbstractController
{
    private $seccions;
    public function __construct(ServeiDadesSeccio $dadesSeccions)
    {
        $this->seccions = $dadesSeccions->get();
    }


    #[Route('/seccions', name: 'seccions_dades')]
    public function seccions_dades(): Response
    {
        return $this->render('seccions.html.twig', [
            'seccions' => $this->seccions,
        ]);
    }
}
