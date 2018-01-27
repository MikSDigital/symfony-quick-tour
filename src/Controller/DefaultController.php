<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\GreetingGenerator;

class DefaultController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/hello/{name}")
     */
    public function index($name, LoggerInterface $logger)
    {
        $logger->info("Saying hello to $name!");

        return $this->render('index.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/simplicity")
     */
    public function simple()
    {
        return new Response('Simple! Easy! Great!');
    }
}