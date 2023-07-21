<?php


?>


<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="./bootstrap.min.css">

</head>
<body>

    <div class="container" style="max-width: 50%;">
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

</body>
</html>
