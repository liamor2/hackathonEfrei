<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenAI\Client as OpenAI;

#[ApiResource]
class AssistantController extends AbstractController
{
    private $entityManager;
    private $api_key;
    private $openai;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->api_key = $_ENV['OPENAI_API_KEY'];
    }

    #[Route('/assistant', name: 'assistant', methods: ['POST'])]
    public function assistant(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $question = $data['question'];

        $this->openai = new OpenAI($this->api_key);

        $response = $this->openai->client()->completions([
            'model' => 'gpt-3.5-turbo',
            'prompt' => $question,
            'max_tokens' => 150
        ]);

        return $this->json([
            'message' => $response->choices[0]->text
        ]);
    }
}