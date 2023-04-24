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
    include "../model/forgotPasswordQuery.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $otp = senitize($_POST["otp"]);
        $flag = true;

        if (empty($otp)) {
            $_SESSION["otp_err_msg"] = "Enter your otp";
            $flag = false;
            header("Location: ../view/otpVerify.php");
        } else {
            $_SESSION["otp_err_msg"] = "";
            $_SESSION["otp"] = $otp;
        }

        if ($flag) {

            if (otpChecking_4($otp)) {

                if (otpApproval_5($otp)) {
                    $_SESSION['loginstatus'] = true;
                    header("Location: ../view/passwordReset.php");
                } else {
                    $_SESSION["admin_approval_err_msg"] = "Wait for admin approval or try again later";
                    header("Location: ../view/otpVerify.php");
                }
            } else {
                $_SESSION["otp_err_msg"] = "Wrong OTP was given.Try again:";
                header("Location: ../view/forgotPassword.php");
            }

        }

    } else {
        header("Location: ../view/forgotPassword.php");
    }