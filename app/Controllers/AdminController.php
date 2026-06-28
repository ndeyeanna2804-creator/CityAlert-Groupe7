<?php

require_once __DIR__ . '/../Repositories/UserRepository.php';
require_once __DIR__ . '/../Repositories/SignalementRepository.php';
require_once __DIR__ . '/../Repositories/CommentaireRepository.php';

class AdminController
{
    private $userRepo;
    private $signalementRepo;
    private $commentaireRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->signalementRepo = new SignalementRepository();
        $this->commentaireRepo = new CommentaireRepository();
    }

    // ===========================
    // DASHBOARD ADMIN
    // ===========================
    public function dashboard()
    {
        $totalUtilisateurs = $this->userRepo->count();

        $totalSignalements = $this->signalementRepo->count();

        $totalCommentaires = $this->commentaireRepo->count();

        $nouveau = $this->signalementRepo->countByStatus("Nouveau");

        $encours = $this->signalementRepo->countByStatus("En cours");

        $resolu = $this->signalementRepo->countByStatus("Résolu");

        $rejete = $this->signalementRepo->countByStatus("Rejeté");

        $utilisateurs = $this->userRepo->findAll();

        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }

    // ===========================
    // LISTE DES UTILISATEURS
    // ===========================
    public function utilisateurs()
    {
        $utilisateurs = $this->userRepo->findAll();

        require_once __DIR__ . '/../Views/admin/utilisateurs.php';
    }

    // ===========================
    // STATISTIQUES
    // ===========================
    public function statistiques()
    {
        $totalUtilisateurs = $this->userRepo->count();

        $totalSignalements = $this->signalementRepo->count();

        $totalCommentaires = $this->commentaireRepo->count();

        $nouveau = $this->signalementRepo->countByStatus("Nouveau");

        $encours = $this->signalementRepo->countByStatus("En cours");

        $resolu = $this->signalementRepo->countByStatus("Résolu");

        $rejete = $this->signalementRepo->countByStatus("Rejeté");

        require_once __DIR__ . '/../Views/admin/statistiques.php';
    }

    // ===========================
    // PROFIL ADMIN
    // ===========================
    public function profil()
    {
        require_once __DIR__ . '/../Views/admin/profil.php';
    }
}