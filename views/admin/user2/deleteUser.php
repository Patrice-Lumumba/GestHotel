<?php
    $connection = mysqli_connect("localhost", "root","");
    $db = mysqli_select_db($connection, 'test');
    
    
    if(isset($_POST['delete']))
    {
        $id = $_POST['id_user'];
        
        $query = "DELETE FROM user WHERE id_user ='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
            echo '<script>alert("Data Deleted");</script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script>alert("Data Not Deleted");</script>';
            // header("Location:index.php");
        }
    }