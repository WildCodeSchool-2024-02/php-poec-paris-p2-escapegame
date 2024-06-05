<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    private $userManager;

    public function __construct()
    {
        parent::__construct();
        $this->userManager = new UserManager();
    }
    public function show(): string
    {
        return $this->twig->render('Login/index.html.twig', []);
    }

    public function registerNewUser(): string
    {
        $userExists = $this->userManager->userExists(($_POST['userName']), ($_POST['userEmail']));

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$userExists) {
            if (
                isset($_POST['userName']) &&
                isset($_POST['userEmail']) &&
                isset($_POST['userPassword'])
            ) {
                $this->userManager->save(
                    $_POST['userName'],
                    $_POST['userEmail'],
                    $_POST['userPassword']
                );
            }
            header('Location: /');
            exit;
        } else {
            return 'user already registered';
        }
    }
}
