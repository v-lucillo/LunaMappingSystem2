<?php
if($_SERVER["REQUEST_METHOD"]== "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "luna_mapping_db";

    $conn= new mysqli($host, $dbusername, $dbpassword, $dbname);
    if($conn->connection_error){
        echo "Connection Failed". $conn->connect_error;
    }
    }
?>