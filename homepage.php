<?php
    include './views/header.php';
//    include 'database.php';
//    global $conn;


if(isset($_POST['submit'])){

    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
    $username = 'root';
    $password = '';

    try {

        $conn = new PDO($dsn, $username, $password);

        // Configuration des options de PDO pour afficher les exceptions en cas d'erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL préparée pour insérer les dates de réservation dans la base de données
        $sql = "INSERT INTO reservation (check_in, check_out) VALUES (:check_in, :check_out)";
        $stmt = $conn->prepare($sql);

        // Affecte les valeurs des paramètres de la requête SQL préparée
        $stmt->bindParam(':check_in', $check_in);
        $stmt->bindParam(':check_out', $check_out);

        // Exécute la requête SQL préparée
        $stmt->execute();

        echo "<script type = 'text/javascript'>alert('Réservation enregistrée avec succès');</script>";
    } catch(PDOException $e) {
        echo "Erreur lors de l'enregistrement de la réservation: " . $e->getMessage();
    }

    // Ferme la connexion à la base de données
    $conn = null;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<section class="home" id="home">
    <div class="text">
        <h1><span>Find</span> your <br>perfect homeplace</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>Officia aut expedita libero assumenda cum at?</p>
        <div class="app-stores">
            <img src="img/ios.png" alt="">
            <img src="img/512x512.png" alt="">
        </div>
    </div>

    <div class="form-container">
        <form action="" method="POST">
<!--            <div class="input-box">-->
<!--                <span>Location</span>-->
<!--                <input type="search" name="" id="" placeholder="Search Places">-->
<!--            </div>-->
            <div class="input-box">
                <label for="check_in">Date d'arrivée:</label>
                <input type="date" id="check_in" name="check_in" required><br><br>
            </div>
            <div class="input-box">
                <label for="dateDepart">Date de départ:</label>
                <input type="date" id="check_out" name="check_out" required><br><br>
            </div>
            <input type="submit" name="submit" id="" class="btn">
        </form>
    </div>
</section>

</body>
</html>

