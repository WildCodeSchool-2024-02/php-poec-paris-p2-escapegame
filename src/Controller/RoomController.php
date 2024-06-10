<?php

namespace App\Controller;

use App\Model\RoomManager;
use App\Model\ChallengeManager;

class RoomController extends AbstractController
{
    /**
     * List rooms
     */
    public function index(): string
    {
        $roomManager = new RoomManager();
        $rooms = $roomManager->selectAll('title');

        return $this->twig->render('room/index.html.twig', ['rooms' => $rooms]);
    }

    /**
     * Show informations for a specific room
     */
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

    /**
     * Show intro room
     */
    public function showIntro(): string
    {
        return $this->twig->render('Rooms/intro.html.twig');
    }

    /**
     * Show outro room
     */
    public function showOutro(): string
    {
        return $this->twig->render('Rooms/outro.html.twig');
    }
}
