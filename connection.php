<?php

    $dbhost = "internship.test";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "login_db";

    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$con){
        die("failed to connect!");
    }
?>