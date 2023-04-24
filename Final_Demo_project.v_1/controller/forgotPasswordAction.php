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
        $email = senitize($_POST["email"]);
        $flag = true;

        if (empty($email)) {
            $_SESSION["email_err_msg"] = "Enter your email";
            $flag = false;
            header("Location: ../view/forgotPassword.php");
        } else {
            $_SESSION["email_err_msg"] = "";
            $_SESSION["email"] = $email;
        }

        if ($flag) {
            $otp = mt_rand(100000, 999999);

            if (emailChecking_1($email)) {
                $subject = "Password recovery";
                $body = "OTP: $otp";
                $from = "from: practicemailsend@gmail.com";

                if (mail($email, $subject, $body, $from)) {

                    if (otpUpdate_2($otp, $email)) {

                        $_SESSION['passwordstatus'] = true;
                        header("Location: ../view/otpVerify.php");
                        die();
                    } else {
                        echo "Try again";
                        die();
                    }

                } else {
                    echo "faild";
                    header("Location: ../view/forgotPassword.php");
                    die();
                }
            } else {
                $_SESSION["email_err_msg"] = "Email not found";
                header("Location: ../view/forgotPassword.php");
                die();
            }

        }

    } else {
        header("Location: ../view/forgotPassword.php");
        die();
    }
    ?>