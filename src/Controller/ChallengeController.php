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

        return $this->twig->render('Challenges/' . $challenge['type'] . '.html.twig', [
            'challenge' => $challenge,
        ]);
    }

    public function validate(int $id): void
    {
        if (isset($_POST['imageOrder'])) {
            $imageOrder = json_decode($_POST['imageOrder'], true);
            var_dump($imageOrder);

            $challengeManager = new ChallengeManager();
            $challenge = $challengeManager->selectOneById($id);

            if ($imageOrder === $challenge['answer']) {
                header('https://odyssey.wildcodeschool.com/agenda');
            }
        }
    }
}
