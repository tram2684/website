<?php
if (isset($_POST['create'])) {
    
    require 'dbh.php';
    
    $username = $_POST['usrname'];
    $password = $_POST['psw'];
    $email = $_POST['email'];
    $confirmpsw = $_POST['confirmpsw'];

    if (empty($username) || empty($password) || empty($email) || empty($confirmpsw)) {
        header("Location: ../register.html?error=emptyfields&username=".$username."&email=".$email);
    }
}