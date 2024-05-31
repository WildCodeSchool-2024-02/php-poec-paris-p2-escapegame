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
            if (isset($_POST['userSolution'])) {
                $jsonString = $_POST['userSolution'];
                $userSolution = json_decode($jsonString, true);
                $userSolution = array_map('trim', array_map('htmlentities', $userSolution));
                $userSolutionString = implode('', $userSolution);
                var_dump($userSolutionString);


                $challengeManager = new ChallengeManager();
                $correctAnswer = $challengeManager->selectChallengeAnswer($id);
                var_dump($correctAnswer['answer']);

                if ($userSolutionString === $correctAnswer['answer']) {
                    var_dump('you win');
                }
            } else {
                throw new Exception('Parameter missing in POST request');
            }
        } else {
            throw new Exception('Invalid request method');
        }
    }
}
