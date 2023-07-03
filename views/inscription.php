
<?php
     include 'header.php';
     include 'functions.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Formulaire d'enregistrement</title>
</head>
<body>
  <div class="container">
    <h1>Formulaire d'enregistrement</h1>
    <form action="" method="POST">
                <?php generate_input('First Name','nom','text','form-control','Enter First Name') ?>
                <?php generate_input('Last Name','prenom','text','form-control','Enter Last Name') ?>
                <?php generate_input('Email','email','text','form-control','Enter Email') ?>
                
                <?php generate_input('Password','password','password','form-control','Enter Password') ?>

                <button class="btn btn-primary" type="submit" name="sign"> Login </button>

                <a href="../index.php" class="btn btn-danger"> CANCEL</a>

            </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
