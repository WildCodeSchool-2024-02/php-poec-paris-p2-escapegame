<?php

use App\Controller\HomeController;

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)

return [
    'credits' => ['CreditsController', 'index',],
    'room' => ['RoomController', 'show', ['rid', 'cid']],
    'challenges' => ['ChallengeController', 'show', ['id']],
    'challenges/validation' => ['ChallengeController', 'validate', ['id']],
    '' => ['HomeController', 'index',],
];
