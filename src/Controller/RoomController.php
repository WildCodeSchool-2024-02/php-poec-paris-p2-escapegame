<?php

namespace App\Controller;

use App\Model\RoomManager;

class RoomController extends AbstractController
{
    public function getChallengeDescription($challengeId): array
    {
        $roomManager = new RoomManager();
        $challenge = $roomManager->getChallengeDescription($challengeId);
        return $challenge;
    }

    public function show(int $id): string
    {
        $roomManager = new RoomManager();
        $room = $roomManager->selectOneById($id);

        $challenge = $this->getChallengeDescription(2);

        return $this->twig->render('Rooms/' . $room['name'] . '.html.twig', [
            'room' => $room,
            'challenge' => $challenge,
        ]);
    }
}
