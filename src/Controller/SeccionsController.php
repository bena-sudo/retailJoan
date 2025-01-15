<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SeccionsController extends AbstractController
{
    private $contactes = array(
        array("codi" => "1", "nom" => "Electrònica", "descripcio" => "Secció dedicada a dispositius electrònics", "any" => "2025", "articles" =>
        array("Smartphone", "Portàtil", "Auriculars", "Càmera")),
        array(
            "codi" => 4,
            "nom" => "Pere Gómez",
            "telefon" => "612345678",
            "email" => "pere.gomez@example.com"
        ),
        array("codi" => "2", "nom" => "Esports", "descripcio" => "Equipaments i accessoris esportius", "any" => "2025", "articles" =>
        array("Pilota", "Raqueta", "Bambes", "Pantalons curts")),
        array(
            "codi" => 6,
            "nom" => "Maria Ferrer",
            "telefon" => "677889900",
            "email" => "maria.ferrer@example.com"
        ),
        array("codi" => "3", "nom" => "Joguines", "descripcio" => "Joguines per a totes les edats", "any" => "2025", "articles" =>
        array("Cotxes de joguina", "Puzzles", "Nines", "Jocs de taula")),
        array(
            "codi" => 8,
            "nom" => "Joan Ruiz",
            "telefon" => "698765432",
            "email" => "joan.ruiz@example.com"
        ),
        array("codi" => "4", "nom" => "Llibres", "descripcio" => "Secció de llibres i literatura", "any" => "2025", "articles" =>
        array("Novel·les", "Còmics", "Llibres infantils", "Llibres de cuina")),
        array(
            "codi" => 10,
            "nom" => "Laura Torres",
            "telefon" => "611223344",
            "email" => "laura.torres@example.com"
        ),
    );

    #[Route('/seccio', name: 'dades_seccio_void')]
    public function dades_seccio_void(): Response
    {

        $resultat = array_filter(
            $this->contactes,
            function ($contacte) {
                return array_key_first($contacte);
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
            $this->contactes,
            function ($contacte) use ($codi) {
                return $contacte["codi"] == $codi;
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
