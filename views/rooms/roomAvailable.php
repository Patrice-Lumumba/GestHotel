<!DOCTYPE html>
<html>
<head>
    <title>Enregistrement et affichage des informations de chambre</title>
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<div class="container">



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
    if(isset($_POST['submit'])) {
        $image = $_FILES['image']['name'];
        $id_chambre = $_POST['id_chambre'];
        $type_chambre = $_POST['type'];
        $is_enable = isset($_POST['is_enable']) ? 1 : 0;
        
        
        $sql = "SELECT * FROM rooms WHERE is_enable = 1";
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
    }
    
    ?>
    
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image de la chambre</label>
            <input type="file" class="form-control-file" name="image" required>
        </div>
        <div class="form-group">
            <label for="id_chambre">ID de la chambre</label>
            <input type="text" class="form-control" name="id_chambre" placeholder="ID de la chambre" required>
        </div>
        <div class="form-group">
            <label for="type">Type de chambre</label>
            <select class="form-control" name="type">
                <option value="ventilé">Ventilé</option>
                <option value="climatisé">Climatisé</option>
            </select>
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
