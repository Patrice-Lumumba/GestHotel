<?php
global $conn;
//$user = $conn->query("SELECT * FROM user ");
include './views/functions.php';

//foreach ($user->fetch_array() as $k => $v){

//}

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
        <div class="card-body">
            <div class="container-fluid">
                <div id="msg"></div>
                <form action="" id="manage-user">
                    <input type="hidden" name="id">
<!--                    --><?php //generate_block();?>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="mdp">Last Name</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                    </div>
                        <small><i>Leave this blank if you dont want to change the password.</i></small>

                    <div class="form-group">
                        <label for="mdp">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tel">Phone</label>
                        <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
                    </div>

                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-md-12">
                <div class="row">
                    <button class="btn btn-sm btn-primary" form="system-frm">Update</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
