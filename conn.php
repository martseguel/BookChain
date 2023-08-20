<?php
    $db = mysqli_connect("201.148.104.209","martsegu_bookchain","Askuru12","martsegu_bookchain");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>