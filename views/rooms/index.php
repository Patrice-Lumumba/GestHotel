


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>CRUD</title>


</head>
<body class="bg-warning">
<div class="container">
    <div class="jumbotron">
        <h2>Liste des chambres </h2>
        <hr>
        <a href="addRoom.php" class="btn btn-success" style="margin-left: 80%;">  DATA </a>

        <?php

        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection, 'test');

        $query = "SELECT * FROM rooms";
        $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-striped" style="background-color: white;">
            <thead class="table-dark">
            <tr>
                <th>ID</th>

                <th>Image</th>
                <th>Type de chambre</th>
                <th>Prix</th>
                <th>is_enable</th>

                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>



            <?php
            if($query_run)
            {
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>

                    <tbody>
                    <tr>
                        <th scope="col"> <?php echo $row['id_chambre']; ?> </th>
                        <th scope="col"><img src="uploads/<?php echo $row['image']; ?>" class="img-avatar img-thumbnail p-0 border-2" alt="Image de la chambre" width="150px" height="150px"></th>
                        <th scope="col"> <?php echo $row['type']; ?> </th>
                        <th scope="col"> <?php echo $row['prix']; ?> </th>
                        <th scope="col"> <?php echo $row['is_enable']; ?> </th>




                        <form action="editRoom.php" method="post">
                            <input type="hidden" name="id_chambre" value="<?php echo $row['id_chambre'] ?>">
                            <th>
                                <button class="btn btn-primary shadow-none" type="submit" name="edit">
                                <input type="hidden" name="edit" class="btn btn-success" value="EDIT" />
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </th>



                        </form>




                        <form action="deleteRoom.php" method="post">
                            <input type="hidden" name="id_chambre" value="<?php echo $row['id_chambre'] ?>">
                            <th>
<!--                                    <input type="submit" name="delete" class="btn btn-danger" value="DELETE" />-->
                                <button class="btn btn-danger shadow-none" type="submit" name="delete">
                                    <input type="hidden" name="edit" class="btn btn-success" value="EDIT" />
                                    <i class="bi bi-trash3"></i>
                                </button>
                                </th>


                        </form>
                    </tr>
                    </tbody>
                    <?php
                    // echo $row['id'];
                    // echo $row['fname'];
                    // echo $row['lname'];
                    // echo $row['contact'];
                }
            }
            else{
                echo "No Records Found";
            }

            ?>

        </table>
    </div>
    <br>

</div>

</div>
</div>
</body>
</html>