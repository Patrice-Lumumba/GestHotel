<?php

// Informations de connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';

try {
    // Création d'une nouvelle connexion PDO
    $pdo = new PDO($dsn, $username, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer les utilisateurs
    $sql = "SELECT * FROM user";

    // Exécution de la requête
    $stmt = $pdo->query($sql);

    // Récupération des résultats
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des utilisateurs
    foreach ($utilisateurs as $utilisateur) {
        echo "ID: " . $utilisateur['user_id'] . "<br>";
        echo "Nom: " . $utilisateur['nom'] . "<br>";
        echo "Email: " . $utilisateur['email'] . "<br><br>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
