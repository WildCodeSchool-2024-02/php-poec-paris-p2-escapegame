<?php

namespace App\Controller;

use App\Model\RoomManager;

class RoomController extends AbstractController
{
    public function getChallenge($challengeId): array
    {
        $roomManager = new RoomManager();
        $challenge = $roomManager->getChallenge($challengeId);
        return $challenge;
    }

    public function show($roomId, $challengeId): string
    {
        // $roomId = (int) $roomId;
        // $challengeId = (int) $challengeId;

        $roomManager = new RoomManager();
        $room = $roomManager->selectOneById($roomId);

        $challenge = $this->getChallenge($challengeId);

        return $this->twig->render('Rooms/room.html.twig', [
            'room' => $room,
            'challenge' => $challenge,
        ]);
    }
}
