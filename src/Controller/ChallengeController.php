<?php

namespace App\Controller;

use App\Model\ChallengeManager;
use App\Model\SaveManager;

class ChallengeController extends AbstractController
{
    private $challengeManager;

    public function __construct()
    {
        parent::__construct();
        $this->challengeManager = new ChallengeManager();
    }

    /**
     * Show informations for a specific challenge
     */
    public function show(int $id): string
    {
        $challenge = $this->challengeManager->selectOneById($id);

        return $this->twig->render('Challenges/' . $challenge['type'] . '.html.twig', [
            'challenge' => $challenge,
        ]);
    }

    /**
     * Validate the array, calls saveProgress and if necessary prepareUserSolution
     */
    public function validate(int $id)
    {
        $challenge = $this->challengeManager->selectOneById($id);

        // TODO add userId dynamically
        $saveController = new SaveManager();
        $saveController->saveProgress(7, $id);

        return $this->twig->render('Challenges/validate.html.twig', [
            'isCorrect' => $_POST['user_answer'] === $challenge['answer'],
            'challenge' => $challenge
        ]);
    }
}
