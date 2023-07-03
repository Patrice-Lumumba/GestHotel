<?php

include 'database.php';
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['mdp'];

        $requete = $conn->prepare("INSERT INTO user (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)");
        $requete->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mdp' => $password
        ));
        $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
        var_dump($reponse);
    }
    

?>