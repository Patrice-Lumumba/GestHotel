<?php
echo "Users";
//include './views/functions.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Insert Data</title>
</head>
<body>
<div>
    <div class="bd-example-snippet bd-code-snippet"><div class="bd-example">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
<div class="container">
    <div class="jumbotron">
        <h2> PHP - CRUD : ADD  new User</h2>
        <hr>
        <form action="" method="POST">
            <div class="form-group">
                <label for=""> First Name </label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for=""> Last Name </label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for=""> Email </label>
<!--                --><?php //generate_input('Password','mdp','password', 'form-group', 'Your password'); ?>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for=""> Password </label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group">
                <label for=""> Tel </label>
                <input type="text" name="contact" class="form-control" placeholder="Enter Contact" required>
            </div>
            
            <button class="btn btn-primary" type="submit" name="insert"> Save Data </button>
            
            <a href="index.php" class="btn btn-danger"> CANCEL</a>
        
        </form>
    </div>
</div>
</body>
</html>
