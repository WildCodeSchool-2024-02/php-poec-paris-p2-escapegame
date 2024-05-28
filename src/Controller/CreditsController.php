<?php

namespace App\Controller;

class CreditsController extends AbstractController
{
    protected $credits;
    public function __construct()
    {
        parent::__construct();
        $this->credits = array(
            "business" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "production" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "writers" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "design" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "programming" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "quality_assurance" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "marketing" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "art_graphics" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "video_cinematics" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "localization" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "public_relations" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "creative_services" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "technology" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "customer_technical_support" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "administration" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "support" => array(
                array("firstname" => "Madani", "lastname" => "Guenn"),
                array("firstname" => "Anna", "lastname" => "Gosme"),
                array("firstname" => "Cyril", "lastname" => "Leconte")
            ),
            "thanks" => array(
                array("firstname" => "Mickaël", "lastname" => "Lambert")
            )
        );
    }
    /**
     * Display credits page
     */

    public function index(): string
    {
        return $this->twig->render('Credits/index.html.twig', ['credits' => $this->credits]);
    }
}
