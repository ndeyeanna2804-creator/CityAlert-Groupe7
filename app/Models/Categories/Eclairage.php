<?php

require_once __DIR__ . '/Categorie.php';

class Eclairage extends Categorie
{
    public function __construct()
    {
        parent::__construct(
            "Éclairage",
            "Haute",
            "24 heures"
        );
    }

    public function description(): string
    {
        return "Signalement concernant l'éclairage public ou les lampadaires défectueux.";
    }
}