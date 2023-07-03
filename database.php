<?php
$server = "localhost";
$database = "test";
$username = "root";
$password = "";
 
// Create connection
 
// $conn = mysqli_connect($server, $username, $password, $database);
 
// Check connection
 
// if (!$conn) {
 
//     die("Connection failed: " . mysqli_connect_error());
 
// }
// echo "Connected successfully";
// mysqli_close($conn);


try{

    $database = new PDO('mysql:host=localhost;dbname=test', $username, $password);
    echo "bien";
    foreach ($database->query('SELECT * FROM user') as $row){
        print_r($row) . "<br/>";
    }

} catch(PDOException $e){
    print "Erreur : " . $e->getMessage() . "<br/>";
    die();
}

?>

