<?php
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_base_de_données";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM table");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo $row['colonne1'] . " - " . $row['colonne2'] . "<br>";
    }
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<?php
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_base_de_données";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$query = "SELECT * FROM table";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['colonne1'] . " - " . $row['colonne2'] . "<br>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
        ?>
    </body>
</html>

<label><?=$label?></label>
    <input type="<?=$type?>" name="<?=$name?>" class="<?=$class?>" placeholder="<?=$placeholder?>" required>

<?php

    $conn = mysqli_connect($servername, $username, $password);
        $db = mysqli_select_db($conn, 'test');

        if (!$conn) {
            die("Erreur de connexion : " . mysqli_connect_error());
        }

        $query = "SELECT * FROM user";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <!-- <tbody> -->
                    <tr>
                        <th> <?php echo $row['id_user']; ?> </th>
                        <th> <?php echo $row['nom']; ?> </th>
                        <th> <?php echo $row['prenom']; ?> </th>
                        <th> <?php echo $row['email']; ?> </th>

                    </tr>
                </tbody>
            <?php
        }

        mysqli_close($conn);
    
        //Utilise ça


        try {
            $conn = new PDO("mysql:host=$server;dbname=test", $login, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // $codesql = "SELECT * FROM user";
            // $conn->exec($codesql);

            // $result = $conn->fetchAll(PDO::FETCH_ASSOC);    

            // foreach ($result as $row) {
            //     echo $row['colonne1'] . " - " . $row['colonne2'] . "<br>";
            // }
                
            echo "Connexion à la BD établie";
            
            
        } catch(PDOException $e) {
            echo "Echec de la connexion : <br>" . $e->getMessage();
            echo "Table not created";
        }



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
    <h1>Formulaire d'enregistrement</h1>

  <?php
  
  
  ?>

    <form action="../index.php" method="POST">
                <?php generate_input('First Name','nom','text','form-control','Enter First Name') ?>
                <?php generate_input('Last Name','prenom','text','form-control','Enter Last Name') ?>
                <?php generate_input('Email','email','text','form-control','Enter Email') ?>
                
                <?php generate_input('Password','mdp','password','form-control','Enter Password') ?>

                <button class="btn btn-primary" type="submit" name="submit"> Login </button>

                <a href="../index.php" class="btn btn-danger"> CANCEL</a>

            </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
