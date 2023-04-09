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
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "ssi_inventory";
            $port = "3306";

            $conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

            if (!$conn) {
                die("Connection failed:" . mysqli_connect_error());
            }
            $sql = "SELECT * FROM employee where username = '$username' AND password ='$password'";
            $result = mysqli_query($conn, $sql);
            $sql_1 = "SELECT * FROM employee where username = '$username' AND password ='$password' and admin_approval='1'";
            $result_1 = mysqli_query($conn, $sql_1);
            // if (mysqli_num_rows($result) > 0) {
            //     header("Location: productManage.php");
            // }
            if (mysqli_num_rows($result) > 0) {

                if (mysqli_num_rows($result_1) > 0) {
                    
                    $_SESSION['loginstatus'] = true;
                    header("Location: productManage.php");
                } else {
                    $_SESSION["admin_approval_err_msg"] = "Wait for admin approval or try again later";
                    
                    header("Location: login.php");


                }
            } else {
                
                $_SESSION["username_password_err_msg"] = "Invalid username or password";
                header("Location: login.php");

            }

        } else {
            

            header("Location: login.php");

        }

    }
    else {
        
        header("Location: login.php");

    }


    //
    
    ?>
</body>

</html>