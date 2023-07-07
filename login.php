<?php


    require_once 'database.php';
    $message = "";
    global $conn;
    if(isset($_POST["sign"]))  
    { 

    if (!empty($_POST['email']) && !empty($_POST['email'])) {
        
        $email = $_POST['email'];
        $password = htmlspecialchars($_POST['mdp']);
        $email = strtolower($email);



        //On vérifie s l'utilisateur est inscrit dans la BDD
        $check = $conn->prepare("SELECT email, mdp FROM user WHERE email = ?");
        // $check->execute(array($email));
        $check->execute(  
            array(  
                 'email'     =>     $_POST["email"],  
                 'mdp'     =>     $_POST["mdp"]  
            )  
       );  

        $row = $check->rowCount();

        if ($row > 0) {
                    $_SESSION['pseudo'] = $data['nom'];
                    header('Location:welcome.php');
        }


    }  else {
        $message = "Tous les champs sont requis";
    }

}

?>