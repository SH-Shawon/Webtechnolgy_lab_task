<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "senitize.php";
    include "../model/employeeQuery.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = senitize($_POST["username"]);
        $password = senitize($_POST["password"]);
        $flag = true;

        if (empty($username)) {
            $_SESSION["username_err_msg"] = "Enter your username";
            $flag = false;
        } else {
            $_SESSION["username_err_msg"] = "";
            $_SESSION["username"] = $username;
        }
        if (empty($password)) {
            $_SESSION["password_err_msg"] = "Enter your password";
            $flag = false;
        } else {
            $_SESSION["password_err_msg"] = "";
            $_SESSION["password"] = $password;
        }

        if ($flag) {
            if (passwordChecking_1($username,$password)) {

                if (loginVerification_2($username,$password)) {
                    
                    $_SESSION['loginstatus'] = true;
                    header("Location: ../view/productManage.php");
                } else {
                    $_SESSION["admin_approval_err_msg"] = "Wait for admin approval or try again later";
                    
                    header("Location: ../view/login.php");
                }
            } else {
                
                $_SESSION["username_password_err_msg"] = "Invalid username or password";
                header("Location: ../view/login.php");
            }
        } else {          
            header("Location: ../view/login.php");
        }
    }
    else {       
        header("Location: ../view/login.php");
    }
    //
    
    ?>
</body>

</html>