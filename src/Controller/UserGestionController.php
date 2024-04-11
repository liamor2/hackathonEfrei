<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;

#[ApiResource]
class UserGestionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/login', name: 'login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $hashedPassword = $data['password'];

        $userRepository = $this->entityManager->getRepository(Users::class);
        $user = $userRepository->findOneBy(['email' => $email, 'password' => $hashedPassword]);

        if (!$user) {
            return $this->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        return $this->json([
            'message' => 'You have successfully logged in'
        ]);
    }

    #[Route('/register', name: 'register', methods: ['POST'])]
    public function register(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $hashedPassword = $data['password'];

        $userRepository = $this->entityManager->getRepository(Users::class);
        $user = $userRepository->findOneBy(['email' => $email]);

        if ($user) {
            return $this->json([
                'message' => 'This email is already in use'
            ], 400);
        }

        $user = new Users();
        $name = $data['name'] ?? null;
        $lastname = $data['lastname'] ?? null;
        $address = $data['address'] ?? null;
        $role = $data['role'] ?? 'user';

        if ($name === null || $lastname === null || $address === null) {
            return $this->json([
                'message' => 'Missing required data'
            ], 400);
        }

        $user->setName($name);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setAddress($address);
        $user->setRole($role);
        $user->setPhone($data['phone'] ?? null);
        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'You have successfully registered'
        ]);
    }

    #[Route('/elevate-role', name: 'elevate_role', methods: ['POST'])]
    public function elevateRole(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $role = $data['role'];

        $userRepository = $this->entityManager->getRepository(Users::class);
        $user = $userRepository->findOneBy(['email' => $email]);

        if (!$user) {
            return $this->json([
                'message' => 'User not found'
            ], 404);
        }

        $user->setRole($role);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'User role has been updated'
        ]);
    }
}