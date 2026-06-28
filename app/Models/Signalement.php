<?php

require_once __DIR__ . '/../Traits/Timestampable.php';

class Signalement
{
    use Timestampable;

    private $id;
    private $titre;
    private $description;
    private $categorie;
    private $adresse;
    private $statut;
    private $user_id;

    public function __construct(
        $id = null,
        $titre = "",
        $description = "",
        $categorie = "",
        $adresse = "",
        $statut = "Nouveau",
        $user_id = null
    )
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->categorie = $categorie;
        $this->adresse = $adresse;
        $this->statut = $statut;
        $this->user_id = $user_id;

        $this->setCreatedAt(date('Y-m-d H:i:s'));
        $this->setUpdatedAt(date('Y-m-d H:i:s'));
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        $this->touch();
    }

    public function setDescription($description)
    {
        $this->description = $description;
        $this->touch();
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        $this->touch();
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        $this->touch();
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
        $this->touch();
    }
}