<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Inscription - CityAlert</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3 class="text-center">

Inscription

</h3>

</div>

<div class="card-body">

<?php if(isset($erreur)): ?>

<div class="alert alert-danger">

<?= $erreur ?>

</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">

<label>Nom complet</label>

<input
type="text"
name="nom"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Mot de passe</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Rôle</label>

<select
name="role"
class="form-select">

<option value="citoyen">

Citoyen

</option>

<option value="agent">

Agent

</option>

<option value="admin">

Administrateur

</option>

</select>

</div>

<div class="d-grid">

<button
type="submit"
class="btn btn-success">

S'inscrire

</button>

</div>

</form>

<hr>

<div class="text-center">

<a href="index.php?action=login">

Déjà inscrit ?

Connexion

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>