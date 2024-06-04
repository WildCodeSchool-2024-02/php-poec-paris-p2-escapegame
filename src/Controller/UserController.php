<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function show(): string
    {
        return $this->twig->render('Login/index.html.twig', []);
    }

    public function registerNewUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
                $userManager = new UserManager();
                $userManager->save($_POST['userName'], $_POST['userEmail'], $_POST['userPassword']);
            }
        }
    }
}
