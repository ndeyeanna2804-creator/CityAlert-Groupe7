<?php

require_once __DIR__ . '/User.php';

class Citoyen extends User
{
    public function __construct(
        $id = null,
        $nom = "",
        $email = "",
        $password = ""
    )
    {
        parent::__construct(
            $id,
            $nom,
            $email,
            $password,
            "citoyen"
        );
    }

    public function dashboard()
    {
        return "Tableau de bord Citoyen";
    }

    public function creerSignalement()
    {
        return true;
    }

    public function modifierSignalement()
    {
        return true;
    }

    public function supprimerSignalement()
    {
        return true;
    }
}