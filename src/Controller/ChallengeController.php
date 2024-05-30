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
        var_dump($challenge);

        return $this->twig->render('Home/index.html.twig');
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

    public function displayChallengeLayout(int $id): string
    {
        $challengeManager = new ChallengeManager();
        $challengeType = $this->getChallengeType($id);

        if ($challengeType['type'] === 'puzzle') {
            $images = $challengeManager->setAssets(1, 3);
            return $this->twig->render('Challenges/puzzle.html.twig', [
                'challengeType' => $challengeType,
                'images' => $images
            ]);
        } else {
            return $this->twig->render('Home/index.html.twig', ['challengeType' => $challengeType]);
        }
    }
}
