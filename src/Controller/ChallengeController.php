<?php

namespace App\Controller;

use App\Model\ChallengeManager;

class ChallengeController extends AbstractController
{
    /**
     * Show informations for a specific challenge
     */
    public function show(int $id): string
    {
        $challengeManager = new ChallengeManager();
        $challenge = $challengeManager->selectOneById($id);
        var_dump($challenge);
        die();
    }

}
