<?php
    
//    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    
//    Fonction pour les champs
    
    function generate_input($label,$name, $type, $class, $placeholder) {
        generate_block('<label>'.$label.'</label> <input type="'.$type.'" name="'.$name.'" placeholder="'.$placeholder.'" class="'.$class.'"');
        
        
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise A Jour des informations</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

    <?php
        session_start();
    //    include 'database.php';
//        global $connection;
        
        
        $sql = "SELECT * FROM user";
        $result =$conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION['id_user'] = $row['id_user'];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        
        
        
        
        $connection = mysqli_connect("localhost", "root","");
        $db = mysqli_select_db($connection, 'test');
        
        $id = $_SESSION['id_user'];
        
        $query = "SELECT * FROM user WHERE id = '$id'";
        $query_run = mysqli_query($connection, $query);
        
        if ($query_run)
        {
            while ($row = mysqli_fetch_array($query_run))
            {
                ?>
                <div class="container">
                    <div class="jumbotron">
                        <h2>PHP - CRUD : Update Data </h2>
                        <hr>
    
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id_user'] ?>" />
<!--                            --><?php //generate_input('First Name','fname','text','form-control','Enter First Name') ?>
                            <div class="form-group">
                                <label for=""> First name: </label>
                                <input type="text" name="nom" class="form-control"  value="<?php echo $row['nom'] ?>" placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for=""> Last Name </label>
                                <input type="text" name="prenom" class="form-control"  value="<?php echo $row['prenom'] ?>" placeholder="Enter Contact" required>
                            </div>

                            <div class="form-group">
                                <label for=""> Phone  </label>
                                <input type="text" name="tel" class="form-control"  value="<?php echo $row['tel'] ?>" placeholder="Enter Contact" required>
                            </div>

                            <div class="form-group">
                                <label for=""> Email </label>
                                <input type="text" name="email" class="form-control"  value="<?php echo $row['email'] ?>" placeholder="Enter Contact" required>
                            </div>

                            <div class="form-group">
                                <label for=""> Arrivée </label>
                                <input type="text" name="check_in" class="form-control"  value="<?php echo $row['check_in'] ?>" placeholder="Enter Contact" required>
                            </div>

                            <div class="form-group">
                                <label for=""> Départ </label>
                                <input type="text" name="check_out" class="form-control"  value="<?php echo $row['check_out'] ?>" placeholder="Enter Contact" required>
                            </div>

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
    
                            <button class="btn btn-primary" type="submit" name="update"> Update Data </button>
    
                            <a href="index.php" class="btn btn-danger"> CANCEL</a>
    
                        </form>
                        
                        <?php
                            
                            if(isset($_POST['update']))
                            {
                                $nom = $_POST['nom'];
                                $prenom = $_POST['prenom'];
                                $tel = $_POST['tel'];
                                $email = $_POST['email'];
                                $check_in = $_POST['check_in'];
                                $check_out = $_POST['check_out'];
                                $role = $_POST['role'];
                                
                                $query = "UPDATE user SET
                                        nom = '$nom',
                                        prenom = '$prenom',
                                        tel = '$tel',
                                        email = '$email',
                                        check_in = '$check_in',
                                        check_out = '$check_out',
                                        role = '$role'
                                        WHERE id='$id' ";
                                $query_run = mysqli_query($connection, $query);
                                
                                if ($query_run == false)
                                {
                                    echo '<script> alert("Data Updated");</script>';
                                    header("Location: index.php");
                                }
                                else
                                {
                                    echo '<script> alert("Data Not Updated");</script>';
                                    
                                }
                            }
                        ?>
                    </div>
                </div>
                
                
                <?php
            }
        }
        else
        {
            echo '<script> alert("No Records Found");</script>';
        }
    ?>

</body>
</html>
