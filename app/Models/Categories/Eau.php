<?php

require_once __DIR__ . '/Categorie.php';

class Eau extends Categorie
{
    public function __construct()
    {
        parent::__construct(
            "Eau",
            "Haute",
            "24 heures"
        );
    }

    public function description(): string
    {
        return "Signalement concernant une fuite d'eau, une canalisation ou une coupure d'eau.";
    }
}