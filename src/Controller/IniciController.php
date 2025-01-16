<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;

class IniciController extends AbstractController
{

    private $logger;
    private $dadesSeccions;


    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/', name: 'inici')]
    public function inici(): Response
    {
        $data_hora = new \DateTime();
        $this->logger->info("Acces el " . $data_hora->format("d/m/y H:i:s"));
        return $this->render('inici.html.twig');
    }
}
