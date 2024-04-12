<?php

namespace App\Controller;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

#[AsController]
#[ApiResource(operations: [
    new Post(
        name: 'login',
        uriTemplate: '/api/login',
        constroller: UserGestionController::login,
        openapiContext: [
            'requestBody' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                            'properties' => [
                                'email' => [
                                    'type' => 'string'
                                ],
                                'password' => [
                                    'type' => 'string'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'responses' => [
                '200' => [
                    'description' => 'You have successfully logged in'
                ],
                '401' => [
                    'description' => 'Invalid email or password'
                ]
            ]
        ]
    ),
    new Post(
        name: 'register',
        uriTemplate: '/api/register',
        constroller: UserGestionController::register,
        openapiContext: [
            'requestBody' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                            'properties' => [
                                'name' => [
                                    'type' => 'string'
                                ],
                                'lastname' => [
                                    'type' => 'string'
                                ],
                                'email' => [
                                    'type' => 'string'
                                ],
                                'address' => [
                                    'type' => 'string'
                                ],
                                'phone' => [
                                    'type' => 'string'
                                ],
                                'password' => [
                                    'type' => 'string'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'responses' => [
                '200' => [
                    'description' => 'You have successfully registered'
                ],
                '400' => [
                    'description' => 'Missing required data'
                ]
            ]
        ]
    ),
    new Post(
        name: 'elevate_role',
        uriTemplate: '/api/elevate-role',
        constroller: UserGestionController::elevateRole,
        openapiContext: [
            'requestBody' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                            'properties' => [
                                'email' => [
                                    'type' => 'string'
                                ],
                                'role' => [
                                    'type' => 'string'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'responses' => [
                '200' => [
                    'description' => 'User role has been updated'
                ],
                '404' => [
                    'description' => 'User not found'
                ]
            ]
        ]
    )
])]
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

        $userRepository = $this->entityManager->getRepository(User::class);
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

        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $email]);

        if ($user) {
            return $this->json([
                'message' => 'This email is already in use'
            ], 400);
        }

        $user = new User();
        $name = $data['name'] ?? null;
        $lastname = $data['lastname'] ?? null;
        $address = $data['address'] ?? null;

        if ($name === null || $lastname === null || $address === null) {
            return $this->json([
                'message' => 'Missing required data'
            ], 400);
        }

        $user->setName($name);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setAddress($address);
        $user->setRole('user');
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

        $userRepository = $this->entityManager->getRepository(User::class);
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