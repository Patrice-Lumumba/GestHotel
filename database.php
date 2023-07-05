<?php
 session_start();  
$server = "localhost";
$database = "test";
$username = "root";
$password = "";
 

try {
    $conn = new PDO("mysql:host=$server;dbname=test", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
    
} catch(PDOException $e) {
    echo "Echec de la connexion : <br>" . $e->getMessage();
    echo "Table not created";
}

?>

