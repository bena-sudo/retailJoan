<?php

namespace App\Controller;

use App\Service\ServeiDadesSeccio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeccioController extends AbstractController
{
    private $seccions;
    public function __construct(ServeiDadesSeccio $dadesSeccions)
    {
        $this->seccions = $dadesSeccions->get();
    }

    #[Route('/seccio', name: 'dades_seccio_void')]
    public function dades_seccio_void(): Response
    {

        $resultat = array_filter(
            $this->seccions,
            function ($seccio) {
                return array_key_first($seccio);
            }
        );

        if (count($resultat) > 0) {
            $resultat = array_shift($resultat);
            return $this->render('dades_seccio.html.twig', [
                'seccio' => $resultat,
            ]);
        } else {
            return $this->render('dades_seccio.html.twig', [
                'seccio' => null,
                'codi' => $resultat['codi'],
            ]);
        }
    }

    #[Route('/seccio/{codi}', name: 'dades_seccio')]
    public function dades_seccio($codi): Response
    {


        $resultat = array_filter(
            $this->seccions,
            function ($seccio) use ($codi) {
                return $seccio["codi"] == $codi;
            }
        );


        if (count($resultat) > 0) {
            $resultat = array_shift($resultat);
            return $this->render('dades_seccio.html.twig', [
                'seccio' => $resultat,
            ]);
        } else {
            return $this->render('dades_seccio.html.twig', [
                'seccio' => null,
                'codi' => $codi,
            ]);
        }
    }
}
