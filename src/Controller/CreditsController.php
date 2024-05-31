<?php

namespace App\Controller;

class CreditsController extends AbstractController
{
    private array $credits;
    public function __construct()
    {
        parent::__construct();
        $this->credits = [
            "business" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "production" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "writers" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "design" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "programming" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "quality_assurance" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "marketing" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "art_graphics" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "video_cinematics" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "localization" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "public_relations" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "creative_services" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "technology" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "customer_technical_support" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "administration" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "support" => [
                ["firstname" => "Madani", "lastname" => "Guenn"],
                ["firstname" => "Anna", "lastname" => "Gosme"],
                ["firstname" => "Cyril", "lastname" => "Leconte"]
            ],
            "thanks" => [
                ["firstname" => "Mickaël", "lastname" => "Lambert"]
            ]
        ];
    }
    /**
     * Display credits page
     */

    public function index(): string
    {
        return $this->twig->render('Credits/index.html.twig', ['credits' => $this->credits]);
    }
}
