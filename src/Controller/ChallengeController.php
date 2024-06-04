<?php

namespace App\Controller;

use Exception;
use App\Model\ChallengeManager;
use RangeException;

class ChallengeController extends AbstractController
{
    public $userSolutionString = "";
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

    public function prepareUserSolution($userSolution)
    {
        $jsonString = $userSolution;
        $userSolution = json_decode($jsonString, true);
        $userSolution = array_map(function ($userSolution) {
            return preg_replace('/\.png$/', '', $userSolution);
        }, $userSolution);
        $userSolution = array_map('trim', array_map('htmlentities', $userSolution));
        $userSolutionString = implode('', $userSolution);
        return $userSolutionString;
    }

    public function validate(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['userPuzzleSolution'])) {
                $this->userSolutionString = $this->prepareUserSolution($_POST['userPuzzleSolution']);
            }
            // add other challenge submissions
            $challengeManager = new ChallengeManager();
            $challenge = $challengeManager->selectOneById($id);
            $isCorrect = $this->userSolutionString === $challenge['answer'];
            return $this->twig->render('Challenges/validate.html.twig', [
                'isCorrect' => $isCorrect,
                'challenge' => $challenge
            ]);
        }
    }
}
