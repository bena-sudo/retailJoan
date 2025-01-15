<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeccioController extends AbstractController
{
    private $seccions = array(
    array(
        "codi" => "1", 
        "nom" => "Ordinadors", 
        "descripcio" => "Secció dedicada a ordinadors i accessoris", 
        "any" => "2025", 
        "articles" => array("Portàtils", "Sobretaules", "Teclats", "Ratolins")
    ),
    array(
        "codi" => "2", 
        "nom" => "Telèfons", 
        "descripcio" => "Secció dedicada a telèfons mòbils i accessoris", 
        "any" => "2025", 
        "articles" => array("Smartphones", "Fundes", "Carregadors", "Auriculars")
    ),
    array(
        "codi" => "3", 
        "nom" => "Consoles", 
        "descripcio" => "Secció de consoles i videojocs", 
        "any" => "2025", 
        "articles" => array("PlayStation", "Xbox", "Nintendo Switch", "Videojocs")
    ),
    array(
        "codi" => "4", 
        "nom" => "Monitors", 
        "descripcio" => "Secció de monitors i pantalles", 
        "any" => "2025", 
        "articles" => array("Monitors Full HD", "Monitors 4K", "Pantalles tàctils", "Suports per a monitors")
    )
);


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
