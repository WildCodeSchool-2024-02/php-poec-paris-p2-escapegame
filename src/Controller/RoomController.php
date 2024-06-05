<?php

namespace App\Controller;

use App\Model\RoomManager;
use App\Model\ChallengeManager;

class RoomController extends AbstractController
{
    public function show($roomId, $challengeId): string
    {
        $roomManager = new RoomManager();
        $room = $roomManager->selectOneById($roomId);

        $challengeManager = new ChallengeManager();
        $currentChallenge = $challengeManager->selectOneById($challengeId);

        return $this->twig->render('Rooms/room.html.twig', [
            'room' => $room,
            'currentChallenge' => $currentChallenge,
        ]);
    }
}
