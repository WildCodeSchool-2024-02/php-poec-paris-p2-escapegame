<?php

namespace App\Controller;

use Exception;
use App\Model\ChallengeManager;
use App\Controller\SaveController;

class ChallengeController extends AbstractController
{
    public $userSolutionString = "";

    /**
     * Show save user challenge progress
     */
    public function saveProgress(int $userId, int $challengeId): void
    {
        $saveController = new SaveController();
        $saveController->saveProgress($userId, $challengeId);
    }

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

    /**
     * Clean json array received for puzzle challenge
     */
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

    /**
     * Validate the array, calls saveProgress and if necessary prepareUserSolution
     */
    public function validate(int $id)
    {
        $challengeManager = new ChallengeManager();
        $challenge = $challengeManager->selectOneById($id);

        return $this->twig->render('Challenges/validate.html.twig', [
            'isCorrect' => $_POST['user_answer'] === $challenge['answer'],
            'challenge' => $challenge
        ]);
    }
}
