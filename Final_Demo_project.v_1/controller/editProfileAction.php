<?php

session_start();

if (!isset($_SESSION['loginstatus'])) {
    session_destroy();
    header("location: login.php");
    die();
}
if (!$_SESSION['loginstatus']) {
    session_destroy();
    header("location: login.php");
    die();
}

if (isset($_SESSION['username'])) {
    $a = $_SESSION['username'];
}

?>
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
        $phone = senitize($_POST["phone"]);
        $address = senitize($_POST["address"]);
        $password = senitize($_POST["pass"]);
        $flag = true;

        if ($flag) {

            if (passwordChecking_1($a, $password)) {

                if (!empty($phone) && !empty($address)) {

                    if (editAllInfo_3($address, $phone, $a)) {

                        $_SESSION["edit_info_msg"] = "Address and Password updated successfully";
                        header("Location: ../view/editProfile.php");
                        die();
                    } else {
                        header("Location: ../view/editProfile.php");
                        die();
                    }
                } else if (!empty($phone)) {
                    if (editPhone_4($phone, $a)) {
                        $_SESSION["edit_info_msg"] = "Phone number updated successfully";
                        header("Location: ../view/editProfile.php");
                        die();

                    } else {
                        header("Location: ../view/editProfile.php");
                        die();
                    }

                } else if (!empty($address)) {
                    if (editAddress_5($address, $a)) {
                        $_SESSION["edit_info_msg"] = "Address updated successfully";
                        header("Location: ../view/editProfile.php");
                        die();

                    } else {
                        header("Location: ../view/editProfile.php");
                        die();
                    }
                } else {
                    header("Location: ../view/editProfile.php");

                }
            } else {
                $_SESSION["pass_err_msg"] = "Incorrect Password";
                header("Location: ../view/editProfile.php");
                die();
            }
        } else {
            header("Location: ../view/productManage.php");
        }
    } else {
        header("Location: ../view/productManage.php");
    }

    ?>
</body>

</html>