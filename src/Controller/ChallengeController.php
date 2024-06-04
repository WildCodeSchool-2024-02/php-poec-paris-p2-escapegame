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
        $name = $challenge['name'];
        $clue = $challenge['clue'];

        return $this->twig->render('Challenges/' . $challenge['type'] . '.html.twig', [
            'name' => $name,
            'id' => $id,
            'clue' => $clue
        ]);
    }
}
