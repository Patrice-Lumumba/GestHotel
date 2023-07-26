<?php
//global $conn;
//$user = $conn->query("SELECT * FROM user ");
//include './views/functions.php';

//foreach ($user->fetch_array() as $k => $v){

//}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>

    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
    <div class="container my-3">
        <h1 class="text-center">Gestion des utilisateurs</h1>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Users
        </button>
        <div class="container" style="max-width: 30%;">
            <div class="text-center mt-5 mb-4">
                <h2>Live Search</h2>
            </div>

            <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
        </div>
        <div id="searchresult"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                $("#live_search").keyup(function (){
                    var input = $(this).val();
                    // alert(input);

                    if(input != ""){
                        $.ajax({
                            url: "livesearch.php",
                            method: "POST",
                            data:{input:input},

                            success: function (data){
                                $("#searchresult").html(data);
                            }
                        });
                    }else{
                        $("#searchresult").css("display", "none");
                    }
                });
            });

        </script>
        <br><br>
        <?php
            
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection, 'test');
            
            $query = "SELECT * FROM user";
            $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-bordered" style="background-color: white;">
            <thead class="table-dark">
            <tr class="text-center">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
<!--                <th>Role</th>-->
                <th colspan="2">Action</th>



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
                            <th> <?php echo $row['id_user']; ?> </th>
                            <th> <?php echo $row['nom']; ?> </th>
                            <th> <?php echo $row['prenom']; ?> </th>
<!--                            <th> --><?php //echo $row['role']; ?><!--</th>-->
<!--                            <th> --><?php //echo $row['email']; ?><!-- </th>-->
                            <!--                    <th> --><?php //echo $row['mdp']; ?><!-- </th>-->
                            <!--                    <th> --><?php //echo $row['tel']; ?><!-- </th>-->


                            <form action="updateUser.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id_user'] ?>">
                                <th> <input type="submit" name="edit" class="btn btn-success" value="EDIT" /> </th>
                            </form>


                            <form action="deleteUser.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id_user'] ?>">
                                <th> <input type="submit" name="delete" class="btn btn-danger" value="DELETE" /> </th>

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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
