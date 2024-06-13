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

    public function register()
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) &&
            isset($_POST['email']) &&
            isset($_POST['password'])
        ) {
            $data = array_map('htmlentities', array_map('trim', $_POST));
            $userExists = $this->userManager->exists(($data['email']));
            $passwordsMatch = $data['password'] === $data['confirmPassword'];

            if (
                empty($data['name']) ||
                empty($data['email']) ||
                empty($data['password']) ||
                empty($data['confirmPassword'])
            ) {
                $this->errors[] = "Vérifiez que tous les champs sont bien remplis";
            }
            if ($userExists) {
                $this->errors[] = 'Un utilisateur avec ce nom ou email existe déjà';
            }
            if (!$passwordsMatch) {
                $this->errors[] = 'Merci de vérifier le mot de passe';
            }
            if (empty($this->errors)) {
                $this->userManager->insert(
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['password']
                );
                header("Location: /intro");
            }
        }
        return $this->twig->render('register.html.twig', []);
    }

    public function login()
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) ||
            isset($_POST['email']) &&
            isset($_POST['password'])
        ) {
            $currentUser = $this->userManager->selectOneByEmail($_POST['email']);
            if (($_POST['password']) === $currentUser['password']) {
                echo 'user login successful';
            }
            header("Location: /intro");
        }
        return $this->twig->render('login.html.twig', []);
    }
}
