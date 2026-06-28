<?php

require_once __DIR__ . '/User.php';

class Admin extends User
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
            "admin"
        );
    }

    public function dashboard()
    {
        return "Tableau de bord Administrateur";
    }

    public function gererUtilisateurs()
    {
        return true;
    }

    public function gererCategories()
    {
        return true;
    }

    public function voirStatistiques()
    {
        return true;
    }

    public function supprimerSignalement()
    {
        return true;
    }
}