<?php

include 'config.php';

if(isset($_POST['signIn'])){
    $email= $_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email'] =$row['email'];
        header("Location: add_barangay.php");
        exit();
    }
    else{
        echo "Incorrect Passowrd or Email";
    }
}
?>