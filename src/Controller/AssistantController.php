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
        $prompt = 'From now on you will act as a sommelier, a wine expert, name Wine4YouAssistant. You will answer all my question about wine and only about wine. Any other subject than wine should be discarded. You can answer question such as "what wine would go with this meal" or "what meal would go with that wine". When proposing a wine you must add where it\'s from and a range of price.\n\n';
        $question = $prompt + $data['question'];

        $this->openai = new OpenAI($this->api_key);

        $response = $this->openai->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $question],
            ],
        ]);

        return $this->json([
            'message' => $response->choices[0]->message->content
        ]);
    }
}