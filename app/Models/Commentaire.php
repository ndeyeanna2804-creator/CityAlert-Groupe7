<?php

require_once __DIR__ . '/../Traits/Timestampable.php';

class Commentaire
{
    use Timestampable;

    private $id;
    private $contenu;
    private $user_id;
    private $signalement_id;

    public function __construct(
        $id = null,
        $contenu = "",
        $user_id = null,
        $signalement_id = null
    )
    {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->user_id = $user_id;
        $this->signalement_id = $signalement_id;

        $this->setCreatedAt(date('Y-m-d H:i:s'));
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getSignalementId()
    {
        return $this->signalement_id;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        $this->touch();
    }
}