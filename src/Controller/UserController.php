<?php

namespace App\Controller;

use App\Model\UserManager;
use Exception;

class UserController extends AbstractController
{
    private UserManager $userManager;
    public $errors = [];

    public function __construct()
    {
        parent::__construct();
        $this->userManager = new UserManager();
    }
    public function show(): string
    {
        return $this->twig->render('Register/index.html.twig', []);
    }

    public function registerNewUser(): void
    {
        $userExists = $this->userManager->userExists(($_POST['name']), ($_POST['email']));
        $passwordsMatch = $_POST['password'] === $_POST['confirmPassword'];

        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) &&
            isset($_POST['email']) &&
            isset($_POST['password'])
        ) {
            if ($userExists) {
                $this->errors = 'Un utilisateur avec ce nom ou email existe déjà';
            }
            if (!$passwordsMatch) {
                $this->errors = 'Merci de vérifier le mot de passe';
            }

            $this->userManager->save(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );
            header('Location: /');
            exit;
        }
    }
}
