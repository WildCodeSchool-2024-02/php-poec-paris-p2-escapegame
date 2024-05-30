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

    public function setAssets(int $room_id, int $id)
    {
        var_dump('test');
        die();
        if ($room_id === 1 && $id === 1){
            $this->assets = ["../../public/assets/images/text1.png", "../../public/assets/images/text2.png"];
        }
    }
}