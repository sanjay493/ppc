<?php


    $servername="localhost:3308";
    $username="root";
    $password="";
    $dbname="test";
    $con = mysqli_connect($servername,$username,$password,$dbname);

    //Check Connection
    if(!$con){
        die("Connection Failed: " .mysqli_connect_error());
    }
    // else{
    //     //echo "You are connected to Database";
    // }

   
    // $user = "sa"; 
    // $password = "SQL123";
    // $ODBCConnection = odbc_connect("DRIVER={ODBC};Server=ntserver;Database=SAILDB;Port=5000;String Types=Unicode", $user, $password);

    // $conn1 = sybase_connect( "ntserver;UID=sa;PWD=SQL123" );
    // if( ! $conn1 ) {
    //     echo "Connection failed\n";
    // } else {
    //     echo "Connected successfully\n";
    //     sybase_close( $conn1 );
    // }