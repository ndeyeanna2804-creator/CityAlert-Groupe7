<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Modifier</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card">

<div class="card-header bg-warning">

<h3>Modifier le commentaire</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Commentaire</label>

<textarea
name="contenu"
rows="5"
class="form-control"
required><?= htmlspecialchars($commentaire['contenu']); ?></textarea>

</div>

<button
class="btn btn-primary">

Modifier

</button>

<a
href="index.php?action=index"
class="btn btn-secondary">

Retour

</a>

</form>

</div>

</div>

</div>

</body>

</html>