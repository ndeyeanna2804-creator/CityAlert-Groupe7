<?php

require_once __DIR__.'/User.php';
require_once __DIR__.'/../Interfaces/NotifiableInterface.php';

class Agent extends User implements NotifiableInterface
{

    public function __construct(
        $id=null,
        $nom="",
        $email="",
        $password=""
    )
    {
        parent::__construct(
            $id,
            $nom,
            $email,
            $password,
            "agent"
        );
    }

    public function dashboard()
    {
        return "Dashboard Agent";
    }

    public function traiterSignalement()
    {
        return true;
    }

    public function changerStatut()
    {
        return true;
    }

    public function envoyerNotification($message)
    {
        return "Notification envoyée : ".$message;
    }
}