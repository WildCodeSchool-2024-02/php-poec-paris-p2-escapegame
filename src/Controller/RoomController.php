<?php

namespace App\Controller;

use App\Model\RoomManager;

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
    public function show(int $id): string
    {
        $roomManager = new RoomManager();
        $roomManager->selectOneById($id);

        return $this->twig->render('Rooms/' . $id . '.html.twig', ['id' => $id]);
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
