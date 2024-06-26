<?php

namespace App\Controller;

use App\Model\ChallengeManager;
use App\Model\SaveManager;

class ChallengeController extends AbstractController
{
    private ChallengeManager $challengeManager;
    //private SaveManager $saveManager;

    public function __construct()
    {
        parent::__construct();
        $this->challengeManager = new ChallengeManager();
        //$this->saveManager = new SaveManager();
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
        //$this->saveManager->saveProgress(7, $id);

        $nextRoomId = $challenge['room_id'];
        if (($challenge['id'] + 1) % 3 === 1) {
            $nextRoomId += 1;
        }

        $answer = array_map('trim', array_map('htmlentities', array_map('strtolower', $_POST)));

        return $this->twig->render('Challenges/validate.html.twig', [
            'nextRoomId' => $nextRoomId,
            'isCorrect' => $answer['user_answer'] === $challenge['answer'],
            'challenge' => $challenge
        ]);
    }
}
