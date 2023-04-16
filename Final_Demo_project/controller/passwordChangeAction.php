<?php session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

} ?>
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

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $currentpass = senitize($_POST["cpass"]);
        $newpass = senitize($_POST["npass"]);
        $repass = senitize($_POST["rpass"]);
        $flag = true;


        if (empty($currentpass)) {
            $_SESSION["newpassa_msg"] = "Enter your currentpass";
            $flag = false;
        } else {
            $_SESSION["newpassa_msg"] = "";
            $_SESSION["cpass"] = $currentpass;
        }
        if (empty($newpass)) {
            $_SESSION["newpassb_msg"] = "Enter your newpass";
            $flag = false;
        } else {
            $_SESSION["newpassb_msg"] = "";
            $_SESSION["npass"] = $newpass;
        }
        if (empty($repass)) {
            $_SESSION["newpassc_msg"] = "RE-write your password";
            $flag = false;
        } else {
            $_SESSION["newpassc_msg"] = "";
            $_SESSION["rpass"] = $repass;
        }

        if ($flag) {

            if (currentPasswordChecking_6($currentpass)) {

                if (isset($_SESSION['npass']) && isset($_SESSION['rpass'])) {
                    if ($_SESSION['npass'] === $_SESSION['rpass']) {
                        if (updatePassword_7($newpass, $username)) {
                            $_SESSION["newpass_msg"] = "Password change successfully";
                            header("Location: ../view/passwordChange.php");
                            die();
                        }
                    } else {
                        $_SESSION["newpass_err_msg"] = "New password don't match with re-writting password";
                        header("Location: ../view/passwordChange.php");
                        die();
                    }
                }

            } else {
                $_SESSION["newpass_err_msg"] = "Current password is wrong";
                header("Location: ../view/passwordChange.php");
            }

        } else {

            header("Location: ../view/passwordChange.php");

        }
    }
    else{
        header("Location: ../view/passwordChange.php");
    }


    //
    
    ?>
</body>

</html>