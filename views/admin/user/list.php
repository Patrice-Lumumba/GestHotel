<?php
//    include 'database.php';
//    include './views/header.php';
//    include 'bootstrap.css';
//    include './views/functions.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Script pour mobile-money-widget-mtn -->
    <!-- <script src="https://widget.northeurope.cloudapp.azure.com:9443/v0.1.0/mobile-money-widget-mtn.js"></script> -->
    <!-- <link rel="stylesheet" href="./bootstrap.css"> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>

<div class="card card-outline card-primary">
    <div class="card-header">
        <div class="container-fluid">
            <h3 class="card-title">List of users</h3>
            <div class="card-tools">
                <a href="manage_user.php" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>Create New</a>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Tel</th>
                        <th>Arrivée</th>
                        <th>Départ</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $query = $conn->query("SELECT *,concat(nom,' ',prenom) as name from 'user' where user_id !='1' order by concat(nom,' ',prenom) asc ");
                    while ($row = $query->fetch_assoc()):
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo ucwords($row['name']) //Mettre La première lettre de chaque mot en Majuscule ?></td>
                            <td><p class="m-0 truncate-1"><?php echo ($row['nom'])?></p></td>
                            <!--                            <td ><p class="m-0">--><?php //echo ($row['type'] == 1 )? "Adminstrator" : "Staff" ?><!--</p></td>-->
                            <td align="center">
                                <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Action
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="?page=user/manage_user&id=<?php echo $row['user_id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--    Supprimer-->
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this User permanently?","delete_user",[$(this).attr('data-id')])
        })
        $('.table td,.table th').addClass('py-1 px-2 align-middle')
        $('.table').dataTable();
    })
    function delete_user($id){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Users.php?f=delete",
            method:"POST",
            data:{id: $id},
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("An error occured.",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp== 'object' && resp.status == 'success'){
                    location.reload();
                }else{
                    alert_toast("An error occured.",'error');
                    end_loader();
                }
            }
        })
    }
</script>

</body>
</html>
