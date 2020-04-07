<?php


    $servername="localhost";
    $username="root";
    $password="";
    $dbname="test";
    $con = mysqli_connect($servername,$username,$password, $dbname);

    //Check Connection
    if(!$con){
        die("Connection Failed: " .mysqli_connect_error());
    }else{
        //echo "You are connected to Database";
    }


    