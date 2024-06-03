<?php

namespace App\Model;

use App\Model\AbstractManager;

class RoomManager extends AbstractManager
{
    public const TABLE = 'room';

    public function __construct()
    {
        parent::__construct();
    }
}
