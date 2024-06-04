<?php

namespace App\Controller;

use App\Model\SaveManager;

class SaveController extends AbstractController
{
    public function saveProgress(int $userId, int $challengeId): void
    {
        $saveManager = new SaveManager();
        $saveManager->saveProgress($userId, $challengeId);
    }
}
