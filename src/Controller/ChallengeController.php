<?php

namespace App\Controller;

use Exception;
use App\Model\ChallengeManager;
use RangeException;

class ChallengeController extends AbstractController
{
    public $images = [
        '1.png',
        '2.png',
        '3.png',
        '4.png',
        '5.png',
        '6.png',
        '7.png',
        '8.png',
        '9.png'
    ];

    public function shuffleImages()
    {
        $shuffledImages = $this->images;
        shuffle($shuffledImages);
        return $shuffledImages;
    }

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
            'images' => $this->shuffleImages(),
        ]);
    }



    public function validate(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jsonString = $_POST['userSolution'];
            $userSolution = json_decode($jsonString, true);
            $userSolution = array_map(function ($filename) {
                return preg_replace('/\.png$/', '', $filename);
            }, $userSolution);
            $userSolution = array_map('trim', array_map('htmlentities', $userSolution));
            $userSolutionString = implode('', $userSolution);

            $challengeManager = new ChallengeManager();
            $correctAnswer = $challengeManager->selectChallengeAnswer($id);
            $challenge = $challengeManager->selectOneById($id);

            if (strlen($userSolutionString) === strlen($correctAnswer['answer'])) {
                $isCorrect = $userSolutionString === $correctAnswer['answer'];
                return $this->twig->render('Challenges/validate.html.twig', [
                    'isCorrect' => $isCorrect,
                    'challenge' => $challenge
                ]);
            } else {
                throw new Exception('Too few arguments');
            }
        }
    }
}
