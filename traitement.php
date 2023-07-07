<?php

include 'database.php';
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['mdp'];
        $tel = $_POST['tel'];

        $cost = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

        $email = strtolower($email); // on transforme toutes les lettres majuscules en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux comptes différents ..
        $requete = $conn->prepare("INSERT INTO user (nom, prenom, email, mdp, tel) VALUES (:nom, :prenom, :email, :mdp, :tel)");
        $requete->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mdp' => $password,
            'tel' => $tel,
        ));
        // $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($reponse);
    }else{
        echo "<script type = 'text/javascript'>alert('Echec d'authentification');</script>";
    }




?>