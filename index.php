<?php 
session_start();


include 'database.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
    
    
<?php include 'views/header.php'; ?>
    
<section id="login" class="my-5">
<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 image-container p-4"><img src="./img/about.png" alt="imge de voiture" srcset="" width="50%" height="50%"></div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="p-4">
                    <h2 class="mb-4">Connexion</h2>
                    <form class="login-form" method="POST" action="">
                        <div class="mb-5">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre email" required name="email" name="email">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Mot de passe:</label>
                            <input type="password" class="form-control" name="mdp" id="password" placeholder="Entrez votre mot de passe" required name="password">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit" name="sign">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>