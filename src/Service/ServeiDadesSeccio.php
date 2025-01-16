<?php

namespace App\Service;

class ServeiDadesSeccio
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

    public function get()
    {
        return $this->seccions;
    }
}
