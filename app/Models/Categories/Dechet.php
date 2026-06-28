<?php

require_once __DIR__ . '/Categorie.php';

class Dechet extends Categorie
{
    public function __construct()
    {
        parent::__construct(
            "Déchets",
            "Moyenne",
            "48 heures"
        );
    }

    public function description(): string
    {
        return "Signalement concernant les déchets, les dépôts sauvages ou les poubelles.";
    }
}