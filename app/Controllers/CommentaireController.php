<?php

require_once __DIR__ . '/../Repositories/CommentaireRepository.php';

class CommentaireController
{
    private $repo;

    public function __construct()
    {
        $this->repo=new CommentaireRepository();
    }

    public function index()
    {
        $commentaires=$this->repo->findAll();

        require_once __DIR__ .
        '/../Views/commentaires/index.php';
    }

    public function create()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!isset($_SESSION['id'])) {
            die("Utilisateur non connecté.");
        }

        $this->repo->create([

            'contenu' => $_POST['contenu'],

            'user_id' => $_SESSION['id'],

            'signalement_id' => $_POST['signalement_id']

        ]);

        header("Location:index.php?action=commentaires");

        exit();
    }

    require_once __DIR__ . '/../Views/commentaires/create.php';
}

    public function edit()
    {
        $id=$_GET['id'];

        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->repo->update($id,[

                'contenu'=>$_POST['contenu']

            ]);

            header("Location:index.php?action=commentaires");

            exit();
        }

        $commentaire=$this->repo->findById($id);

        require_once __DIR__ .
        '/../Views/commentaires/edit.php';
    }

    public function delete()
    {
        $this->repo->delete($_GET['id']);

        header("Location:index.php?action=commentaires");

        exit();
    }
}