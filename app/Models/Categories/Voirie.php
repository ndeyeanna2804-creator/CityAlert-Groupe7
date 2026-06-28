<?php

require_once __DIR__ . '/Categorie.php';

class Voirie extends Categorie
{
    public function __construct()
    {
        parent::__construct(
            "Voirie",
            "Moyenne",
            "72 heures"
        );
    }

    public function description(): string
    {
        return "Signalement concernant une route dégradée, un trottoir ou un nid-de-poule.";
    }
}