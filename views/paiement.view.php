<?php
//
//include 'header.php';
//?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Paiement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0F0F0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #FFF;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 3px;
            font-size: 16px;
        }

        .form-group select {
            cursor: pointer;
        }

        .form-group .expiry-date {
            display: flex;
        }

        .form-group .expiry-date .month,
        .form-group .expiry-date .year {
            flex: 1;
            margin-right: 10px;
        }

        .form-group .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #FFF;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group .btn:hover {
            background-color: #45A049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Formulaire de Paiement</h2>
    <form>
        <div class="form-group">
            <label for="card-number">N° Carte:</label>
            <input type="text" id="card-number" name="card-number" placeholder="N° Carte" required>
        </div>
        <div class="form-group expiry-date">
            <div class="month">
                <label for="expiry-month">Mois:</label>
                <select id="expiry-month" name="expiry-month" required>
                    <option disabled selected>Choisissez un mois</option>
                    <option value="01">Janvier</option>
                    <option value="02">Février</option>
                    <option value="03">Mars</option>
                    <!-- Ajoutez les autres mois ici -->
                </select>
            </div>
            <div class="year">
                <label for="expiry-year">Année:</label>
                <select id="expiry-year" name="expiry-year" required>
                    <option disabled selected>Choisissez une année</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <!-- Ajoutez les autres années ici -->
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Valider" class="btn">
        </div>
    </form>
</div>
</body>
</html>
