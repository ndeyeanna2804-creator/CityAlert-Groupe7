<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Connexion - CityAlert</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3 class="text-center">Connexion</h3>

</div>

<div class="card-body">

<?php if(isset($erreur)): ?>

<div class="alert alert-danger">

<?= $erreur ?>

</div>

<?php endif; ?>

<form method="POST">

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

<div class="d-grid">

<button
type="submit"
class="btn btn-primary">

Se connecter

</button>

</div>

</form>

<hr>

<div class="text-center">

<a href="index.php?action=register">

Créer un compte

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>