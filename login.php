<?php

    require_once 'database.php';

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = htmlspecialchars($_POST['mdp']);


        //Insertion dans la BD

        $check = $db->prepare("SELECT nom, prenom, email, mdp FROM user WHERE email = ?");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();


        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($row == 0) {
                $db->prepare("INSERT INTO user (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)")
                    ->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'mdp' => $password,
                        // 'token' => bin2hex(random_bytes(32))
                    ));
                header('Location: ../index.php');
            } else {
                echo 'Cette adresse email existe déjà';
            }
        }


    }

?>