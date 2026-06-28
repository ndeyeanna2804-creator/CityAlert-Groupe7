<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Commentaires</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>Commentaires</h3>

        </div>

        <div class="card-body">

            <?php if(empty($commentaires)): ?>

                <div class="alert alert-info">

                    Aucun commentaire.

                </div>

            <?php else: ?>

                <?php foreach($commentaires as $commentaire): ?>

                    <div class="border rounded p-3 mb-3">

                        <h6 class="fw-bold">

                            <?= htmlspecialchars($commentaire['auteur']); ?>

                        </h6>

                        <p>

                            <?= nl2br(htmlspecialchars($commentaire['contenu'])); ?>

                        </p>

                        <small class="text-muted">

                            <?= $commentaire['created_at']; ?>

                        </small>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>

</html>