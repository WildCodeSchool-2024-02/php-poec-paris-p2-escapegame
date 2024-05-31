<?php

namespace App\Controller;

use Exception;
use App\Model\ChallengeManager;
use RangeException;

class ChallengeController extends AbstractController
{
    /**
     * Show informations for a specific challenge
     */
    public function show(int $id): string
    {
        $challengeManager = new ChallengeManager();
        $challenge = $challengeManager->selectOneById($id);
        $challenge = $challengeManager->selectOneById($id);
        $name = $challenge['name'];
        $instructions = $challenge['instructions'];
        $challengeType = $challenge['type'];

        return $this->twig->render('Challenges/' . $challenge['type'] . '.html.twig', [
            'challengeType' => $challengeType,
            'name' => $name,
            'instructions' => $instructions,
            'id' => $id
        ]);
    }

    public function getChallengeType(int $id): array|string
    {
        $challengeManager = new ChallengeManager();
        $challenge = $challengeManager->selectChallengeType($id);
        if (empty($challenge)) {
            echo $this->twig->render('Error/error.html.twig');
            die();
        }
        return $challenge;
    }

    public function validate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $id = (int)$_POST['id'];
                $userAnswer = array_map('trim', array_map('htmlentities', $_POST));

                $challengeManager = new ChallengeManager();
                $correctAnswer = $challengeManager->selectChallengeAnswer($id);

                if ($userAnswer['user_answer'] === $correctAnswer['answer']) {
                    header('Location: https://odyssey.wildcodeschool.com/');
                    exit;
                } else {
                    return 'false';
                }
            } else {
                throw new Exception('ID parameter missing in POST request');
            }
        } else {
            throw new Exception('Invalid request method');
        }
    }
}
