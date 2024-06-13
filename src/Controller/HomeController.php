<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */

    public function index(): string
    {
        return $this->twig->render('home.html.twig');
    }

    /**
     * Display info page
     */

    public function showInfo(): string
    {
        return $this->twig->render('info.html.twig');
    }
}
