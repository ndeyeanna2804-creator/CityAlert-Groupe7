<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CityAlert - Liste des signalements</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php?action=dashboard">

            <i class="bi bi-geo-alt-fill"></i>

            CityAlert

        </a>

        <div>

            <a href="index.php?action=dashboard" class="btn btn-light">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <a href="index.php?action=create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i>
                Nouveau signalement
            </a>

            <a href="index.php?action=logout" class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i>
                Déconnexion
            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            <h3>

                <i class="bi bi-list-task"></i>

                Liste des signalements

            </h3>

        </div>

        <div class="card-body">

            <?php if(empty($signalements)): ?>

                <div class="alert alert-info">

                    Aucun signalement enregistré.

                </div>

            <?php else: ?>

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                    <tr>

                        <th>ID</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Adresse</th>
                        <th>Statut</th>
                        <th width="330">Actions</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($signalements as $signalement): ?>

                    <tr>

                        <td><?= $signalement['id']; ?></td>

                        <td><?= htmlspecialchars($signalement['titre']); ?></td>

                        <td><?= htmlspecialchars($signalement['categorie']); ?></td>

                        <td><?= htmlspecialchars($signalement['adresse']); ?></td>

                        <td>

                            <?php

                            $couleur="secondary";

                            switch($signalement['statut']){

                                case "Nouveau":
                                    $couleur="secondary";
                                    break;

                                case "En cours":
                                    $couleur="warning";
                                    break;

                                case "Résolu":
                                    $couleur="success";
                                    break;

                                case "Rejeté":
                                    $couleur="danger";
                                    break;

                            }

                            ?>

                            <span class="badge bg-<?= $couleur; ?>">

                                <?= htmlspecialchars($signalement['statut']); ?>

                            </span>

                        </td>

                        <td>

                            <a href="index.php?action=edit&id=<?= $signalement['id']; ?>"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                                Modifier

                            </a>

                            <a href="index.php?action=delete&id=<?= $signalement['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Supprimer ce signalement ?')">

                                <i class="bi bi-trash"></i>

                                Supprimer

                            </a>

                            <a href="index.php?action=ajouter-commentaire&signalement_id=<?= $signalement['id']; ?>"
                                class="btn btn-info btn-sm">

                                <i class="bi bi-chat-left-text"></i>

                                Commenter

                            </a>
                            <br>
                            <br>

                            <form action="index.php" method="GET">

    <input type="hidden" name="action" value="statut">

    <input type="hidden" name="id"
           value="<?= $signalement['id'] ?>">

    <select name="statut"
            class="form-select">

        <option>Nouveau</option>

        <option>En cours</option>

        <option>Résolu</option>

        <option>Rejeté</option>

    </select>

    <button class="btn btn-primary mt-2">

        Modifier

    </button>

</form>
                      

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

            <?php endif; ?>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>