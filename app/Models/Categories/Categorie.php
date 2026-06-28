<?php

abstract class Categorie
{
    protected string $nom;
    protected string $priorite;
    protected string $delai;

    public function __construct(
        string $nom,
        string $priorite,
        string $delai
    ) {
        $this->nom = $nom;
        $this->priorite = $priorite;
        $this->delai = $delai;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPriorite(): string
    {
        return $this->priorite;
    }

    public function getDelai(): string
    {
        return $this->delai;
    }

    abstract public function description(): string;
}