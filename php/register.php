<?php
if (isset($_POST['create'])) {
    
    require 'dbh.php';
    
    $username = $_POST['usrname'];
    $password = $_POST['psw'];
    $email = $_POST['email'];
    $confirmpsw = $_POST['confirmpsw'];

    if (empty($username) || empty($password) || empty($email) || empty($confirmpsw)) {
        header("Location: ../register.html?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.html?error=invalidusernameemail");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.html?error=invalidmail&username=".$username.);
        exit();
    }
    else if (!preg_match("^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.html?error=invalidusername&email=".$email);
        exit();
    }
    else if ($password !== $confirmpsw) {
        header("Location: ../register.html?error=passwordcheck&username=".$username."&email=".$email);
        exit();
    }
    else {
        $sql = "SELECT users FROM users WHERE users=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.html?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                header("Location: ../register.html?error=usertaken&email=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (users, email, pwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn); 
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.html?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.html?signup=success");
                    exit(); 
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../register.html");
    exit(); 
}