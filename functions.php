<?php

function generate_block($input_label) {
    ?>
    <div class="form-floating mb-3">
        <?=$input_label?>
    </div>
    <?php
}
function generate_input($label,$name, $type, $class, $placeholder) {
    generate_block('<label>'.$label.'</label> <input type="'.$type.'" name="'.$name.'" placeholder="'.$placeholder.'" class="'.$class.'"');


}

function database() {
    
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
}

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