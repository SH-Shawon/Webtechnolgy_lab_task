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
        $otp = senitize($_POST["otp"]);
        $flag = true;

        if (empty($otp)) {
            $_SESSION["otp_err_msg"] = "Enter your otp";
            $flag = false;
            header("Location: otpVerify.php");
        } else {
            $_SESSION["otp_err_msg"] = "";
            $_SESSION["otp"] = $otp;
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
            $sql = "SELECT * FROM employee where otp= '$otp'";
            $result = mysqli_query($conn, $sql);
            $sql_1 = "SELECT * FROM employee where otp= '$otp' AND admin_approval='1'";
            $result_1 = mysqli_query($conn, $sql_1);
            if(mysqli_num_rows($result) > 0){ 

               
                if(mysqli_num_rows($result_1) > 0){
                    $_SESSION['loginstatus'] = true;
                    header("Location: productManage.php");
                }
                else{
                    $_SESSION["admin_approval_err_msg"]="Wait for admin approval or try again later";
                    header("Location: otpVerify.php");
    

                }
            }
            else{
                $_SESSION["otp_err_msg"]="Wrong OTP was given.Try again:";
                header("Location: forgotPassword.php");
            }

       }

    }
    else{
        header("Location: forgotPassword.php");
    }
   