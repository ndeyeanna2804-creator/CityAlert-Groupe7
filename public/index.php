<?php

session_start();

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/SignalementController.php';
require_once __DIR__ . '/../app/Controllers/CommentaireController.php';
require_once __DIR__ . '/../app/Controllers/DashboardController.php';

/*
|--------------------------------------------------------------------------
| INSTANCIATION
|--------------------------------------------------------------------------
*/

$auth = new AuthController();
$signalement = new SignalementController();
$commentaire = new CommentaireController();
$dashboard = new DashboardController();

/*
|--------------------------------------------------------------------------
| ROUTES
|--------------------------------------------------------------------------
*/

$action = $_GET['action'] ?? 'login';

switch ($action) {

    /*
    |--------------------------------------------------------------------------
    | AUTHENTIFICATION
    |--------------------------------------------------------------------------
    */

    case 'login':
        $auth->login();
        break;

    case 'register':
        $auth->register();
        break;

    case 'logout':
        $auth->logout();
        break;

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    case 'dashboard':

    switch ($_SESSION['role']) {

        case 'admin':
            $dashboard->admin();
            break;

        case 'agent':
            $dashboard->agent();
            break;

        case 'citoyen':
            $dashboard->citoyen();
            break;

        default:
            header("Location: index.php?action=login");
            exit();
    }

    break;

    /*
    |--------------------------------------------------------------------------
    | SIGNALEMENTS
    |--------------------------------------------------------------------------
    */

    case 'index':
        $signalement->index();
        break;

    case 'create':
        $signalement->create();
        break;

    case 'edit':
        $signalement->edit();
        break;

    case 'delete':
        $signalement->delete();
        break;

    case 'statut':
        $signalement->changerStatut();
        break;

    /*
    |--------------------------------------------------------------------------
    | COMMENTAIRES
    |--------------------------------------------------------------------------
    */

    case 'commentaires':
        $commentaire->index();
        break;

    case 'ajouter-commentaire':
        $commentaire->create();
        break;

    case 'modifier-commentaire':
        $commentaire->edit();
        break;

    case 'supprimer-commentaire':
        $commentaire->delete();
        break;

    /*
    |--------------------------------------------------------------------------
    | DEFAULT
    |--------------------------------------------------------------------------
    */

    default:
        $auth->login();
        break;
}