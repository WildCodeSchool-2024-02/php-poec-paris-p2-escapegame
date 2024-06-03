<?php

namespace App\Model;

use App\Model\AbstractManager;

class ChallengeManager extends AbstractManager
{
    public const TABLE = 'challenge';
    public array $assets;

    public function __construct()
    {
        parent::__construct();
    }
}
