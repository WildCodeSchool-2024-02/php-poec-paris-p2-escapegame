<?php

namespace App\Controller;

use Exception;
use App\Model\ChallengeManager;
use RangeException;

class ChallengeController extends AbstractController
{
    public array $data;
    /**
     * Show informations for a specific challenge
     */

    public function show(int $id): string
    {
        $challengeManager = new ChallengeManager();
        $challenge = $challengeManager->selectOneById($id);

        return $this->twig->render('Challenges/' . $challenge['type'] . '.html.twig', [
            'challenge' => $challenge,
        ]);
    }



    public function validate(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jsonString = $_POST['userSolution'];
            $userSolution = json_decode($jsonString, true);
            $userSolution = array_map('trim', array_map('htmlentities', $userSolution));
            $userSolutionString = implode('', $userSolution);

            $challengeManager = new ChallengeManager();
            $correctAnswer = $challengeManager->selectChallengeAnswer($id);
            $challenge = $challengeManager->selectOneById($id);

            if (isset($_POST['userSolution']) && (count($_POST['userSolution']) === count($correctAnswer))) {
                $isCorrect = $userSolutionString === $correctAnswer['answer'];
                return $this->twig->render('Challenges/validate.html.twig', [
                    'isCorrect' => $isCorrect,
                    'challenge' => $challenge
                ]);
            } else {
                throw new Exception('Too few arguments');
            }
        }
    }
}
