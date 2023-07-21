<?php
include ("config.php");
global $conn;

if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM user where nom LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){?>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>Id</tr>
                <tr>Nom</tr>
                <tr>Prenom</tr>
                <tr>Tel</tr>
                <tr>Mot de passe</tr>
                <tr></tr>
            </thead>

            <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($result)){

//                    $id = $row['user_id'];
                    $name = $row['nom'];
                    $lname = $row['prenom'];
                    $email = $row['email'];
                    $tel = $row['tel'];

                    ?>

                        <tr>
<!--                            <td>--><?php //echo $id; ?><!--</td>-->
                            <td><?php echo $name; ?></td>
                            <td><?php echo $lname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $tel; ?></td>
                        </tr>

                    <?php
                }
            ?>
            </tbody>
        </table>

    <?php

    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }

}