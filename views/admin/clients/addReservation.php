<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Réservation</title>
</head>
<body>
<h2>Formulaire de Réservation</h2>

<?php
// Vérifie si le formulaire a été soumis
if(isset($_POST['submit'])){
    // Récupère les valeurs des champs du formulaire
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    // Configuration de la connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
    $username = 'root';
    $password = '';

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO($dsn, $username, $password);

        // Configuration des options de PDO pour afficher les exceptions en cas d'erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL préparée pour insérer les dates de réservation dans la base de données
        $sql = "INSERT INTO user (check_in, check_out) VALUES (:check_in, :check_out)";
        $stmt = $conn->prepare($sql);

        // Affecte les valeurs des paramètres de la requête SQL préparée
        $stmt->bindParam(':check_in', $check_in);
        $stmt->bindParam(':check_out', $check_out);

        // Exécute la requête SQL préparée
        $stmt->execute();

        echo "Réservation enregistrée avec succès.";
    } catch(PDOException $e) {
        echo "Erreur lors de l'enregistrement de la réservation: " . $e->getMessage();
    }

    // Ferme la connexion à la base de données
    $conn = null;
}
?>

<form method="POST" action="">
    <label for="check_in">Date d'arrivée:</label>
    <input type="date" id="check_in" name="check_in" required><br><br>

    <label for="dateDepart">Date de départ:</label>
    <input type="date" id="check_out" name="check_out" required><br><br>

    <input type="submit" name="submit" value="Réserver">
</form>
</body>
</html>
