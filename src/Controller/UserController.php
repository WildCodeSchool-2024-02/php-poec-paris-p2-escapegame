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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeInput($_POST);
            $this->validateInput($data);
            $this->checkUserExistence($data['name'], $data['email']);
            $this->checkPasswordMatch($data['password'], $data['confirmPassword']);

            if (empty($this->errors)) {
                $this->userManager->save($data['name'], $data['email'], $data['password']);
            }

            return $this->twig->render('register.html.twig', ['errors' => $this->errors]);
        }
    }

    private function sanitizeInput($input)
    {
        return array_map('htmlentities', array_map('trim', $input));
    }

    private function validateInput($data)
    {
        if (
            empty($data['name']) ||
            empty($data['email']) ||
            empty($data['password']) ||
            empty($data['confirmPassword'])
        ) {
            $this->errors[] = "Vérifiez que tous les champs sont bien remplis";
        }
    }

    private function checkUserExistence($name, $email)
    {
        if ($this->userManager->userExists($name, $email)) {
            $this->errors[] = 'Un utilisateur avec ce nom ou email existe déjà';
        }
    }

    private function checkPasswordMatch($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            $this->errors[] = 'Merci de vérifier le mot de passe';
        }
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