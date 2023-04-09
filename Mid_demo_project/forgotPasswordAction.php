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
        $email = senitize($_POST["email"]);
        $flag = true;

        if (empty($email)) {
            $_SESSION["email_err_msg"] = "Enter your email";
            $flag = false;
            header("Location: forgotPassword.php");
        } else {
            $_SESSION["email_err_msg"] = "";
            $_SESSION["email"] = $email;
        }

        if ($flag) {
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "ssi_inventory";
            $port = "3306";

            $otp = mt_rand(100000, 999999);

            $conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

            if (!$conn) {
                die("Connection failed:" . mysqli_connect_error());
            }
            $sql = "SELECT * FROM employee where email= '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $subject = "Password recovery";
                $body = "OTP: $otp";
                $from = "from: practicemailsend@gmail.com";

                if(mail($email,$subject,$body,$from)){

                    $sql_1 ="UPDATE employee SET otp='$otp' where email= '$email'";
                    $result_1 = mysqli_query($conn, $sql_1);
                    
                    header("Location: otpVerify.php");
                    echo "mail send";
                }else{
                    echo "faild";
                    header("Location: forgotPassword.php");
                }
            }
            else{
                $_SESSION["email_err_msg"]="Email not found";
                header("Location: forgotPassword.php");
            }

       }

    }
    else{
        header("Location: forgotPassword.php");
    }
   ?>