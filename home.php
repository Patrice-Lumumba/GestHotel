<?php

// Start session
// session_start();

include './views/header.php';
include './database.php';
global $conn;
$message = "";


if (isset($_POST['sign'])) {

if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
  $email = $_POST['email'];
  $password = $_POST['mdp'];

  // Requête pour récupérer l'utilisateur avec l'email et le mot de passe spécifiés
  $query = "SELECT * FROM user WHERE email = :email AND mdp = :mdp";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':mdp', $password);
  $stmt->execute();

  // Vérifier si l'utilisateur existe dans la base de données
  if ($stmt->rowCount() > 0) {
      // Redirection vers la page "welcome" si l'utilisateur est connecté
      header('location: welcome.php');
      echo "<script type = 'text/javascript'>alert('Conexion réussie');</script>";

      exit();
  } else {
    echo "<script type = 'text/javascript'>alert('Identifiant inconnu');</script>";
  }
}else{
    echo "<script type = 'text/javascript'>alert('Tous les champs sont requis');</script>";
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

        <!-- Script pour mobile-money-widget-mtn -->
    <!-- <script src="https://widget.northeurope.cloudapp.azure.com:9443/v0.1.0/mobile-money-widget-mtn.js"></script> -->
    <!-- <link rel="stylesheet" href="./bootstrap.css"> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>




<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Formulaire de Connexion</h1>
        <!-- <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
      <div class="col-md-10 mx-auto col-lg-5">

        <form class="p-4 p-md-5 border rounded-3 bg-light"  method="post"  >


        <?php if(isset($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="mdp">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <input class="w-100 btn btn-lg btn-primary" type="submit" name="sign">Se connecter</button>
          <hr class="my-4">
          <small class="text-muted">Pas encore de compte? Cliquez <a href="./views/inscription.php">ici</a></small>
        </form>
      </div>
    </div>
  </div>

</body>
</html>