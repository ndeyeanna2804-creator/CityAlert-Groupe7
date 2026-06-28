<?php

require_once __DIR__ . '/../Repositories/SignalementRepository.php';
require_once __DIR__ . '/../Exceptions/ValidationException.php';
require_once __DIR__ . '/../Exceptions/EntityNotFoundException.php';

class SignalementController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new SignalementRepository();
    }

    // ============================
    // LISTE DES SIGNALEMENTS
    // ============================
    public function index()
    {
        $signalements = $this->repo->findAll();

        require_once __DIR__ . '/../Views/signalements/index.php';
    }

    // ============================
    // AJOUTER UN SIGNALEMENT
    // ============================
    public function create()
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (
                    empty($_POST['titre']) ||
                    empty($_POST['description']) ||
                    empty($_POST['categorie']) ||
                    empty($_POST['adresse'])
                ) {
                    throw new ValidationException(
                        "Tous les champs sont obligatoires."
                    );
                }

                $data = [
                    'titre' => trim($_POST['titre']),
                    'description' => trim($_POST['description']),
                    'categorie' => trim($_POST['categorie']),
                    'adresse' => trim($_POST['adresse']),
                    'user_id' => $_SESSION['id']
                ];

                $this->repo->create($data);

                header("Location: index.php?action=index");
                exit();
            }

        } catch (ValidationException $e) {

            $erreur = $e->getMessage();

        }

        require_once __DIR__ . '/../Views/signalements/create.php';
    }

    // ============================
    // MODIFIER
    // ============================
    public function edit()
    {
        try {

            if (!isset($_GET['id'])) {
                throw new EntityNotFoundException(
                    "Signalement introuvable."
                );
            }

            $id = $_GET['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (
                    empty($_POST['titre']) ||
                    empty($_POST['description']) ||
                    empty($_POST['categorie']) ||
                    empty($_POST['adresse'])
                ) {
                    throw new ValidationException(
                        "Tous les champs sont obligatoires."
                    );
                }

                $data = [
                    'titre' => trim($_POST['titre']),
                    'description' => trim($_POST['description']),
                    'categorie' => trim($_POST['categorie']),
                    'adresse' => trim($_POST['adresse'])
                ];

                $this->repo->update($id, $data);

                header("Location: index.php?action=index");
                exit();
            }

            $signalement = $this->repo->findById($id);

            if (!$signalement) {
                throw new EntityNotFoundException(
                    "Signalement inexistant."
                );
            }

        } catch (ValidationException | EntityNotFoundException $e) {

            die($e->getMessage());

        }

        require_once __DIR__ . '/../Views/signalements/edit.php';
    }

    // ============================
    // SUPPRIMER
    // ============================
    public function delete()
    {
        try {

            if (!isset($_GET['id'])) {
                throw new EntityNotFoundException(
                    "Signalement introuvable."
                );
            }

            $this->repo->delete($_GET['id']);

            header("Location: index.php?action=index");
            exit();

        } catch (EntityNotFoundException $e) {

            die($e->getMessage());

        }
    }

    // ============================
    // CHANGER LE STATUT
    // ============================
    public function changerStatut()
{
    if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'agent') {
        die("Accès refusé.");
    }

    $this->repo->updateStatus($_GET['id'], $_GET['statut']);

    header("Location: index.php?action=index");
    exit();
}

    // ============================
    // TABLEAU DE BORD
    // ============================
    public function dashboard()
    {
        $total = $this->repo->count();

        $nouveau = $this->repo->countByStatus("Nouveau");

        $encours = $this->repo->countByStatus("En cours");

        $resolu = $this->repo->countByStatus("Résolu");

        $rejete = $this->repo->countByStatus("Rejeté");

        require_once __DIR__ . '/../Views/dashboard/dashboard.php';
    }
}