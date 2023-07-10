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

<?php

    $check = $conn->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 0){
        if(strlen($email <= 100)){
            if(!$password){
                $cost = ['cost' => 12];
                $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                //Insertion

            }else{echo "<script type = 'text/javascript'>alert('Echec d'authentification');</script>";die();}
        }else{echo "<script type = 'text/javascript'>alert('Email');</script>";die();}
    }else{header('Location: ../index.php');die();}





    $requete = $conn->prepare("INSERT INTO user (nom, prenom, email, mdp, tel) VALUES (:nom, :prenom, :email, :mdp, :tel)");
        $requete->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mdp' => $password,
            'tel' => $tel,
        ));

?>



<!-- Revoir index.php -->

<?php

    require_once 'database.php';
    $message = "";
    if(isset($_POST["sign"]))  
    { 

    if (!empty($_POST['email']) && !empty($_POST['email'])) {
        
        $email = $_POST['email'];
        $password = htmlspecialchars($_POST['mdp']);
        $email = strtolower($email);



        //On vérifie s l'utilisateur est inscrit dans la BDD
        $check = $conn->prepare("SELECT email, mdp FROM user WHERE email = :email AND mdp =:mdp");
        // $check->execute(array($email));
        $check->execute(  
            array(  
                 'email'     =>     $_POST["email"],  
                 'mdp'     =>     $_POST["mdp"]  
            )  
       );  

        $row = $check->rowCount();

        if ($row > 0) {
                    header('Location:welcome.php');
                    $message = "Connexion réussie";
                    $_SESSION['name'] = $_POST['nom'];

        }else {
          $message = "Mot de passe ou email incorrect";

        }


    }  else {
        $message = "Tous les champs sont requis";
    }

}

?>

<!-- Pour la connexion -->

<?php
// Start session
session_start();

// Check if user is already logged in, redirect to another page if true
if(isset($_SESSION['email'])) {
    header("Location: welcome.php");
    exit;
}

// Check if login form is submitted
if(isset($_POST['login'])) {
    // Simulating username and password check
    

    $email = $_POST['email'];
    $password = $_POST['mdp'];

    if(!empty($_POST['email']) && !empty($_POST['mdp'])) {
        // Store username in session
        $_SESSION['email'] = $username;

        // Redirect to dashboard page
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="email" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="mdp" id="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>


<?php

    require_once 'database.php';
    $message = "";
    if(isset($_POST["sign"]))  
    { 

    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        
        $email = $_POST['email'];
        $password = htmlspecialchars($_POST['mdp']);
        $email = strtolower($email);



        //On vérifie s l'utilisateur est inscrit dans la BDD
        $check = $conn->prepare("SELECT email, mdp FROM user WHERE email = :email AND mdp =:mdp");
        // $check->execute(array($email));
        $check->execute(  
            array(  
                 'email'     =>     $_POST["email"],  
                 'mdp'     =>     $_POST["mdp"]  
            )  
       );  

        $row = $check->rowCount();

        if ($row > 0) {
                    header('Location:welcome.php');
                    $message = "Connexion réussie";
                    $_SESSION['name'] = $_POST['nom'];

        }else {
          $message = "Mot de passe ou email incorrect";

        }


    }  else {
        $message = "Tous les champs sont requis";
    }

}


//    Sauvegarder l'image dans la BD
function storeImageInDatabase($imagePath) {
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lecture du contenu de l'image
        $imageData = file_get_contents($imagePath);

        // Encodage de l'image en base64
        $base64Image = base64_encode($imageData);

        // Préparation de la requête SQL pour insérer l'image dans la base de données
        $stmt = $conn->prepare("INSERT INTO images (image_data) VALUES (:image)");
        $stmt->bindParam(':image', $base64Image);

        // Exécution de la requête
        $stmt->execute();

        echo "L'image a été stockée dans la base de données avec succès.";
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $conn = null;
}

?>
<!--Recherche-->
<?php
function search($query) {
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=nom_de_la_base_de_donnees;charset=utf8';
$username = 'nom_utilisateur';
$password = 'mot_de_passe';
$options = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $username, $password, $options);

// Préparation de la requête SQL avec un paramètre de recherche
$sql = "SELECT * FROM table WHERE colonne LIKE :query";

// Exécution de la requête avec le paramètre de recherche
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':query' => '%'.$query.'%'));

// Récupération des résultats de la requête
$results = $stmt->fetchAll();

// Retour des résultats
return $results;
}

$query = "SELECT *, concat(nom,' ',prenom) as name from 'user' where user_id !='1' order by concat(nom,' ',prenom) asc ";
$result = $pdo->query($query);
