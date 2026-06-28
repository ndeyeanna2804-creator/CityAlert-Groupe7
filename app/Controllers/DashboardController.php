<?php

require_once __DIR__ . '/../Repositories/SignalementRepository.php';
require_once __DIR__ . '/../Repositories/UserRepository.php';
require_once __DIR__ . '/../Repositories/CommentaireRepository.php';

class DashboardController
{
    private $signalementRepo;
    private $userRepo;
    private $commentaireRepo;

    public function __construct()
    {
        $this->signalementRepo = new SignalementRepository();
        $this->userRepo = new UserRepository();
        $this->commentaireRepo = new CommentaireRepository();
    }

    private function chargerDonnees()
    {
        $totalSignalements = $this->signalementRepo->count();
        $nouveau = $this->signalementRepo->countByStatus("Nouveau");
        $encours = $this->signalementRepo->countByStatus("En cours");
        $resolu = $this->signalementRepo->countByStatus("Résolu");
        $rejete = $this->signalementRepo->countByStatus("Rejeté");
        $totalUtilisateurs = $this->userRepo->count();
        $totalCommentaires = $this->commentaireRepo->count();
        $derniersSignalements = $this->signalementRepo->getLastFive();

        return compact(
            'totalSignalements',
            'nouveau',
            'encours',
            'resolu',
            'rejete',
            'totalUtilisateurs',
            'totalCommentaires',
            'derniersSignalements'
        );
    }

    public function admin()
    {
        extract($this->chargerDonnees());
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }

    public function agent()
    {
        extract($this->chargerDonnees());
        require_once __DIR__ . '/../Views/agent/dashboard.php';
    }

    public function citoyen()
    {
        extract($this->chargerDonnees());
        require_once __DIR__ . '/../Views/citoyen/dashboard.php';
    }
}