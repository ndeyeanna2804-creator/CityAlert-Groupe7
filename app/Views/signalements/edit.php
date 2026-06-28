<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Modifier un signalement</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h3>Modifier un signalement</h3>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">Titre</label>

                    <input
                        type="text"
                        name="titre"
                        class="form-control"
                        value="<?= htmlspecialchars($signalement['titre']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Description</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        required><?= htmlspecialchars($signalement['description']) ?></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">Catégorie</label>

                    <select
                        name="categorie"
                        class="form-select"
                        required>

                        <option value="Voirie"
                            <?= ($signalement['categorie'] == 'Voirie') ? 'selected' : ''; ?>>
                            Voirie
                        </option>

                        <option value="Eclairage"
                            <?= ($signalement['categorie'] == 'Eclairage') ? 'selected' : ''; ?>>
                            Éclairage
                        </option>

                        <option value="Déchets"
                            <?= ($signalement['categorie'] == 'Déchets') ? 'selected' : ''; ?>>
                            Déchets
                        </option>

                        <option value="Eau"
                            <?= ($signalement['categorie'] == 'Eau') ? 'selected' : ''; ?>>
                            Eau
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Adresse</label>

                    <input
                        type="text"
                        name="adresse"
                        class="form-control"
                        value="<?= htmlspecialchars($signalement['adresse']) ?>"
                        required>

                </div>

                <div class="d-flex justify-content-between">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        💾 Enregistrer les modifications

                    </button>

                    <a
                        href="index.php"
                        class="btn btn-secondary">

                        Retour

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>