<?php

namespace App\Controller;

use App\Model\SaveManager;

class UserController extends AbstractController
{
    public function saveProgress(int $userId, int $challengeId): void
    {
        $saveManager = new SaveManager();
        $saveManager->saveProgress($userId, $challengeId);
    }
}
