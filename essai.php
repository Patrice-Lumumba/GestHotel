
<?php

session_start();
require_once './database.php';
include './views/header.php';
include './views/functions.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Formulaire d'enregistrement</title>
  <link rel="stylesheet" href="./bootstrap.css">

</head>
<body>

<div class="container">
    <h1 class="text-center">Formulaire d'enregistrement</h1><br>

    <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Votre nom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Votre prénom">
            <label for="floatingPassword">Votre Prenom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingInput" placeholder="N° Téléphone">
            <label for="floatingInput">Telephone</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <hr class="my-4">
        <small class="text-muted">Vous avez déjà un compte? Cliquez <a href="./views/inscription.php">ici</a></small>
        </form>
    </div>

</div>
</body>
</html>