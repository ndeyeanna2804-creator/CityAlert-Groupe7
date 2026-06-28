<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Dashboard | CityAlert</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <style>

        body{
            background:#f4f6f9;
        }

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:250px;
            height:100vh;
            background:#0d6efd;
            color:white;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:15px;
        }

        .sidebar a:hover{
            background:#084298;
        }

        .content{
            margin-left:250px;
            padding:30px;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .card i{
            font-size:40px;
        }

    </style>

</head>

<body>

<div class="sidebar">

    <h3 class="text-center mt-4">

        <i class="bi bi-buildings"></i>

        CityAlert

    </h3>

    <hr>

    <a href="index.php?action=dashboard">

        <i class="bi bi-speedometer2"></i>

        Dashboard

    </a>

    <a href="index.php?action=index">

        <i class="bi bi-list-ul"></i>

        Signalements

    </a>

    <a href="index.php?action=commentaires">

        <i class="bi bi-chat-left-text"></i>

        Commentaires

    </a>

    <a href="index.php?action=create">

        <i class="bi bi-plus-circle"></i>

        Nouveau signalement

    </a>

    <a href="index.php?action=logout">

        <i class="bi bi-box-arrow-right"></i>

        Déconnexion

    </a>

</div>

<div class="content">

<div class="container-fluid">

<div class="d-flex
justify-content-between
align-items-center
mb-4">

<h2>

Bienvenue Administrateur

<?= $_SESSION['nom']; ?>

👑

</h2>

<span class="badge bg-primary p-3">

<?= date("d/m/Y"); ?>

</span>

</div>

<div class="row">

<div class="col-lg-3">

<div class="card bg-primary text-white shadow">

<div class="card-body">

<div class="d-flex
justify-content-between">

<div>

<h5>Signalements</h5>

<h2>

<?= $totalSignalements ?>

</h2>

</div>

<i class="bi bi-geo-alt-fill"></i>

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="card bg-success text-white shadow">

<div class="card-body">

<div class="d-flex
justify-content-between">

<div>

<h5>Utilisateurs</h5>

<h2>

<?= $totalUtilisateurs ?>

</h2>

</div>

<i class="bi bi-people-fill"></i>

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="card bg-warning shadow">

<div class="card-body">

<div class="d-flex
justify-content-between">

<div>

<h5>Commentaires</h5>

<h2>

<?= $totalCommentaires ?>

</h2>

</div>

<i class="bi bi-chat-fill"></i>

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="card bg-danger text-white shadow">

<div class="card-body">

<div class="d-flex
justify-content-between">

<div>

<h5>Résolus</h5>

<h2>

<?= $resolu ?>

</h2>

</div>

<i class="bi bi-check-circle-fill"></i>

</div>

</div>

</div>

</div>

</div>
<div class="row mt-4">

    <div class="col-md-3">

        <div class="card border-start border-secondary border-5 shadow-sm">

            <div class="card-body">

                <h5 class="text-secondary">

                    <i class="bi bi-file-earmark"></i>

                    Nouveaux

                </h5>

                <h1><?= $nouveau ?></h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-start border-warning border-5 shadow-sm">

            <div class="card-body">

                <h5 class="text-warning">

                    <i class="bi bi-hourglass-split"></i>

                    En cours

                </h5>

                <h1><?= $encours ?></h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-start border-success border-5 shadow-sm">

            <div class="card-body">

                <h5 class="text-success">

                    <i class="bi bi-check-circle"></i>

                    Résolus

                </h5>

                <h1><?= $resolu ?></h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card border-start border-danger border-5 shadow-sm">

            <div class="card-body">

                <h5 class="text-danger">

                    <i class="bi bi-x-circle"></i>

                    Rejetés

                </h5>

                <h1><?= $rejete ?></h1>

            </div>

        </div>

    </div>

</div>

<div class="row mt-5">

    <div class="col-lg-6">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">

                <h5>

                    <i class="bi bi-lightning-charge-fill"></i>

                    Actions rapides

                </h5>

            </div>

            <div class="card-body d-grid gap-3">

                <a href="index.php?action=create"
                   class="btn btn-success">

                    <i class="bi bi-plus-circle"></i>

                    Nouveau signalement

                </a>

                <a href="index.php?action=index"
                   class="btn btn-primary">

                    <i class="bi bi-list-task"></i>

                    Voir tous les signalements

                </a>

                <a href="index.php?action=commentaires"
                   class="btn btn-warning">

                    <i class="bi bi-chat-left-text"></i>

                    Voir les commentaires

                </a>

                <a href="index.php?action=logout"
                   class="btn btn-danger">

                    <i class="bi bi-box-arrow-right"></i>

                    Déconnexion

                </a>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card shadow">

            <div class="card-header bg-success text-white">

                <h5>

                    <i class="bi bi-bar-chart-fill"></i>

                    Statistiques

                </h5>

            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <thead>

                        <tr>

                            <th>Statut</th>

                            <th>Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>Nouveaux</td>

                            <td><?= $nouveau ?></td>

                        </tr>

                        <tr>

                            <td>En cours</td>

                            <td><?= $encours ?></td>

                        </tr>

                        <tr>

                            <td>Résolus</td>

                            <td><?= $resolu ?></td>

                        </tr>

                        <tr>

                            <td>Rejetés</td>

                            <td><?= $rejete ?></td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
<div class="row mt-5">

    <div class="col-12">

        <div class="card shadow">

            <div class="card-header bg-dark text-white">

                <h5>

                    <i class="bi bi-clock-history"></i>

                    Derniers signalements

                </h5>

            </div>

            <div class="card-body">

                <div class="alert alert-info">

                    Cette section affichera prochainement les 5 derniers signalements enregistrés.

                </div>

                <a href="index.php?action=index"
                   class="btn btn-primary">

                    <i class="bi bi-list-ul"></i>

                    Voir tous les signalements

                </a>

            </div>

        </div>

    </div>

</div>

<footer class="mt-5">

    <div class="card">

        <div class="card-body text-center">

            <strong>CityAlert</strong>

            <br>

            Système de gestion des signalements citoyens

            <br><br>

            <small class="text-muted">

                © <?= date('Y') ?> CityAlert - Tous droits réservés

            </small>

        </div>

    </div>

</footer>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>