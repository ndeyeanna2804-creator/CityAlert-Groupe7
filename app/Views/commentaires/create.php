<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Nouveau commentaire</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card">

<div class="card-header bg-success text-white">

<h3>Ajouter un commentaire</h3>

</div>

<div class="card-body">

<form method="POST">

<input
type="hidden"
name="signalement_id"
value="<?= $_GET['signalement_id']; ?>">

<div class="mb-3">

<label>Commentaire</label>

<textarea
name="contenu"
rows="5"
class="form-control"
required></textarea>

</div>

<button
class="btn btn-success">

Publier

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