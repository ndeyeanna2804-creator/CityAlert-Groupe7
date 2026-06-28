<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">

<title>CityAlert</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Nouveau signalement</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Titre</label>

<input
type="text"
name="titre"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"
rows="5"
required></textarea>

</div>

<div class="mb-3">

<label>Catégorie</label>

<select
name="categorie"
class="form-select">

<option value="Voirie">Voirie</option>

<option value="Eclairage">Éclairage</option>

<option value="Déchets">Déchets</option>

<option value="Eau">Eau</option>

</select>

</div>

<div class="mb-3">

<label>Adresse</label>

<input
type="text"
name="adresse"
class="form-control"
required>

</div>

<button
class="btn btn-success">

Enregistrer

</button>

</form>

</div>

</div>

</div>

</body>

</html>