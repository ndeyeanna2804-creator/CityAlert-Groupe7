<?php
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-4">

        <h2>
            <i class="bi bi-people-fill"></i>
            Gestion des utilisateurs
        </h2>

        <a href="index.php?action=dashboard"
           class="btn btn-primary">

            <i class="bi bi-arrow-left"></i>

            Dashboard

        </a>

    </div>

    <?php if(empty($utilisateurs)): ?>

        <div class="alert alert-info">

            Aucun utilisateur trouvé.

        </div>

    <?php else: ?>

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            Liste des utilisateurs

        </div>

        <div class="card-body">

            <table class="table table-striped table-hover">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Nom</th>

                        <th>Email</th>

                        <th>Rôle</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($utilisateurs as $user): ?>

                    <tr>

                        <td><?= $user['id']; ?></td>

                        <td><?= htmlspecialchars($user['nom']); ?></td>

                        <td><?= htmlspecialchars($user['email']); ?></td>

                        <td>

                            <span class="badge bg-primary">

                                <?= ucfirst($user['role']); ?>

                            </span>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <?php endif; ?>

</div>

<?php
require_once __DIR__ . '/../layouts/footer.php';
?>