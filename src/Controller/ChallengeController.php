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

        if ($challengeType['type'] === 'anagramme') {
            $challenge = $challengeManager->selectOneById($id);
            $name = $challenge['name'];
            $instructions = $challenge['instructions'];
            $images = $challengeManager->setAssets(1, 1);
            return $this->twig->render('Challenges/anagramme.html.twig', [
                'challengeType' => $challengeType,
                'images' => $images,
                'name' => $name,
                'instructions' => $instructions
            ]);
        } else {
            return $this->twig->render('Home/index.html.twig', ['challengeType' => $challengeType]);
        }
    }
}
