<?php

if (isset($_POST['login'])) {
    require 'dbh.php';

    $email = $_POST['mailusrname'];
    $password = $_POST['psw'];

    if (empty($email) || empty($password)) {
        header("Location: ../login.html?error=emptyfields");
        exit();  
    }
    else {
        $sql = "SELECT * FROM users WHERE users=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.html?error=sqlerror");
            exit();  
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_varify($password, $row['pwd']);
                if ($pwdcheck == false) {
                    header("Location: ../login.html?error=wrongpwd");
                    exit(); 
                }
                else if ($pwdcheck ==  true) {
                    session_start();
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['username'] = $row['users'];
                    header("Location: ../login.html?login=success");
                    exit();
                }
                else {
                    header("Location: ../login.html?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("Location: ../login.html?error=nouser");
                exit(); 
            }
        }
    }
}
else {
    header("Location: ../login.html");
    exit();  
}