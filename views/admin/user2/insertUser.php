<?php
    
    function generate_block($input_label) {
        ?>
        <div class="form-group">
            <?=$input_label?>
        </div>
        <?php
    }
    function generate_input($label,$name, $type, $class, $placeholder,$id) {
        generate_block('<label>'.$label.'</label> <input type="'.$type.'" name="'.$name.'" id="'.$id.'" placeholder="'.$placeholder.'" class="'.$class.'"');
        
        
    }
    
    
    session_start();
    $server = "localhost";
    $database = "test";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$server;dbname=test", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    echo "Connexion : <br>";
    
    } catch (PDOException $e) {
        echo "Echec de la connexion : <br>" . $e->getMessage();
//    echo "Table not created";
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Insert Data</title>
</head>
<body>

<div>
    <div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
            <div id="toggle-theme-btn"><i class="bi bi-sun"></i></div>


            <style type="text/css">
                :root {
                    --background-color: #ffffff; /* Couleur de fond par défaut (clair) */
                    --text-color: #000000; /* Couleur du texte par défaut (clair) */
                }

                body {
                    background-color: var(--background-color);
                    color: var(--text-color);
                }

                .dark-theme {
                    --background-color: #212121; /* Couleur de fond pour le thème sombre */
                    --text-color: #ffffff; /* Couleur du texte pour le thème sombre */
                    transition: .5s ;
                }
            </style>

            <script type="text/javascript">
                document.getElementById('toggle-theme-btn').addEventListener('click', function() {
                    document.body.classList.toggle('dark-theme'); // Ajoute ou supprime la classe 'dark-theme' au corps de la page
                });
            </script>
            <nav aria-label="breadcrumb">
                
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="jumbotron">
                    <h2> Add User</h2>
                    <hr>
                    <form action="" id="myform" method="POST">
                        <?php generate_input('First Name','nom','text','form-control ','Enter First Name','name') ?>
                        <?php generate_input('Last Name','prenom','text','form-control','Enter First Name','firstnamr') ?>
                        <?php generate_input('Tel','tel','text','form-control','Enter Phone Number','tel') ?>
                        <?php generate_input('Email','email','email','form-control ','Enter Email','email') ?>
                        <?php generate_input('Arrivée','check_in','datetime-local','form-control','Arrivée','') ?>
                        
                        <?php generate_input('Départ','check_out','datetime-local','form-control','Départ','') ?><br>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Rôle</label>
                            <select class="form-select" id="inputGroupSelect01" name="role">
                                <option selected>...</option>
                                
                                
                                <?php
                                    
                                    $query = "SELECT * FROM role";
                                    $stmt = $conn->prepare($query);
                                    //
                                    $stmt->execute();
                                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ( $users as $user) {
                                        ?>
                                        <option name="<?=$user['name']?>"><?=$user['name']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        

                        <button class="btn btn-primary" type="submit" name="insert"> Save Data </button>

                        <a href="index.php" class="btn btn-danger"> CANCEL</a>

                    </form>
                </div>
            </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="/assests/validateFrom.js"></script>
</html>


<?php
    
    $connection = mysqli_connect("localhost", "root","");
    $db = mysqli_select_db($connection, 'test');




$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';

$dbh = new PDO($dsn, $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['insert']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $role = $_POST['role'];


    $stmt = $dbh->prepare("INSERT INTO user (nom, prenom, tel, email, check_in, check_out, role) VALUES('$nom', '$prenom', '$tel', '$email', '$check_in', '$check_out', '$role')");
    $stmt->execute();

//    $lastInsertId = $dbh->lastInsertId();
//
//    echo "ID de la dernière insertion : $lastInsertId";
//
//    $roles = $user['name']; // Supposons que les rôles sélectionnés sont stockés dans un tableau
//    foreach ($roles as $idRole) {
//        $requete = $dbh->prepare("INSERT INTO role_user (user_id, role_id) VALUES (?, ?)");
//        $requete->execute([$lastInsertId, $idRole]);
//    }


}



?>