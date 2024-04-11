<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

#[ApiResource]
class ServerTestController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(): Response
    {
        return $this->json([
            'message' => 'The server is working correctly!'
        ]);
    }

    public function database(): Response
    {
        $conn = $this->entityManager->getConnection();

        return $this->json([
            'message' => 'The database is working correctly!'
        ]);
    }
}