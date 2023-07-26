<!DOCTYPE html>
<html>
<head>
    <title>Enregistrement et affichage des informations de chambre</title>
    <link rel="stylesheet" href="../../bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Enregistrement et affichage des informations de chambre</h1>

    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Enregistrement des informations de chambre dans la base de données
    if(isset($_POST['submit'])){
        $image = $_FILES['image']['name'];
//        $id_chambre = $_POST['id_chambre'];
        $type_chambre = $_POST['type'];
        $prix = $_POST['prix'];
        $is_enable = isset($_POST['is_enable']) ? 1 : 0;

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);

        // Déplacer le fichier image téléchargé vers le dossier "uploads"
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Requête d'insertion des données dans la base de données
        $sql = "INSERT INTO rooms (image, type, prix, is_enable)
                    VALUES ('$image',  '$type_chambre', '$prix', '$is_enable')";

        if ($conn->query($sql) === TRUE) {
            echo '<p class="alert alert-success">Les informations de la chambre ont été enregistrées avec succès !</p>';
        } else {
            echo '<p class="alert alert-danger">Erreur lors de l\'enregistrement des informations de la chambre : ' . $conn->error . '</p>';
        }
    }

    // Récupération des informations de chambre depuis la base de données
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des informations de chaque chambre
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="card" style="width: 18rem;">
                <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="Image de la chambre">
                <div class="card-body">
                    <h5 class="card-title">Chambre <?php echo $row['id_chambre']; ?></h5>
                    <p class="card-text">Type : <?php echo $row['type']; ?></p>
                    <p class="card-text">Disponibilité : <?php echo ($row['is_enable'] == 1) ? 'Disponible' : 'Non disponible'; ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>Aucune chambre enregistrée.</p>';
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>

    <!-- Formulaire pour enregistrer les informations de la chambre -->
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image de la chambre</label>
            <input type="file" class="form-control-file" name="image" required>
        </div>

        <div class="form-group">
            <label for="type">Type de chambre</label>
            <select class="form-control" name="type">
                <option value="ventilé">Ventilé</option>
                <option value="climatisé">Climatisé</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prix">Prix de la chambre</label>
            <input type="text" class="form-control" name="prix" placeholder="Prix de la chambre" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="is_enable">
            <label class="form-check-label">Chambre disponible</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>