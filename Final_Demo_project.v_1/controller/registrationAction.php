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
    include "../model/employeeQuery.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = senitize($_POST["username"]);
        $fullname = senitize($_POST["fullname"]);
        $email = senitize($_POST["email"]);
        $address = senitize($_POST["address"]);
        $nidnumber = senitize($_POST["nidnumber"]);
        $phnnumber = senitize($_POST["phnnumber"]);
        $password = senitize($_POST["password"]);
        $flag = true;

        if (empty($username)) {
            $_SESSION["username_err_msg"] = "Enter your username";
            $flag = false;
        } else {
            $_SESSION["username_err_msg"] = "";
            $_SESSION["username"] = $username;
        }

        if (empty($fullname)) {
            $_SESSION["fullname_err_msg"] = "Enter your fullname";
            $flag = false;
        } else {
            $_SESSION["fullname_err_msg"] = "";
            $_SESSION["fullname"] = $fullname;
        }

        if (empty($email)) {
            $_SESSION["email_err_msg"] = "Enter your email";
            $flag = false;
        } else {
            $_SESSION["email_err_msg"] = "";
            $_SESSION["email"] = $email;
        }

        if (empty($address)) {
            $_SESSION["address_err_msg"] = "Enter your address";
            $flag = false;
        } else {
            $_SESSION["address_err_msg"] = "";
            $_SESSION["address"] = $address;
        }

        if (empty($nidnumber)) {
            $_SESSION["nidnumber_err_msg"] = "Enter your nidnumber";
            $flag = false;
        } else {
            $_SESSION["nidnumber_err_msg"] = "";
            $_SESSION["nidnumber"] = $nidnumber;
        }

        if (empty($phnnumber)) {
            $_SESSION["phnnumber_err_msg"] = "Enter your phnnumber";
            $flag = false;
        } else {
            $_SESSION["phnnumber_err_msg"] = "";
            $_SESSION["phnnumber"] = $phnnumber;
        }


        if (empty($password)) {
            $_SESSION["password_err_msg"] = "Enter your password";
            $flag = false;
        } else {
            $_SESSION["password_err_msg"] = "";
            $_SESSION["password"] = $password;
        }

        if ($flag) {

            if (!validateEmail($email)) {
                $_SESSION["email_err_msg"] = "Invalid Email";
                header("Location: ../view/registration.php");
                die();
            }

            if (usernameChecking_8($username)) {

                $_SESSION["username_err_msg"] = "This user name already exist";
                header("Location: ../view/registration.php");

            } else if (emailChecking_1($email)) {

                $_SESSION["email_err_msg"] = "This email already exist";
                header("Location: ../view/registration.php");


            } else if (nidnumberChecking_9($nidnumber)) {

                $_SESSION["nidnumber_err_msg"] = "This NID number already exist";
                header("Location: ../view/registration.php");


            } else {

                if (userInsert_10($username, $fullname, $email, $address, $nidnumber, $phnnumber, $password)) {
                    $_SESSION['registration_msg'] = "Registration was Successful.
                    Now login";
                    header("Location: ../view/login.php");
                    die();

                } else {
                    echo "3rd test";
                    $_SESSION['registration_err_msg'] = "Error while saving";
                    header("Location: ../view/registration.php");
                    die();
                }


            }

        } else {
            // $_SESSION["username_password_err_msg"] = "Invalid username or password";
            header("Location: ../view/registration.php");

        }

    } else {
        header("Location: ../view/registration.php");
    }

    ?>
</body>

</html>