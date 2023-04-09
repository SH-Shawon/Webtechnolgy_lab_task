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

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

                $servername = "localhost";
                $uname = "root";
                $pass = "";
                $dbname = "ssi_inventory";
                $port = "3306";

                $conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

                if (!$conn) {
                    die("Connection failed:" . mysqli_connect_error());
                }
                $sql = "SELECT * FROM employee where password = '$currentpass'";
                $result = mysqli_query($conn, $sql);
                

                if (mysqli_num_rows($result) > 0) {

                    if (isset($_SESSION['npass']) && isset($_SESSION['rpass'])) {
                        if($_SESSION['npass']===$_SESSION['rpass'])
                        {
                            $sql_1 = "UPDATE employee SET password = '$newpass' where username='$username'";
                            $result_1 = mysqli_query($conn, $sql_1);
                             $_SESSION["newpass_msg"] = "Password change successfully";
                             header("Location: passwordChange.php");
                             die();
                        }
                        else {
                            $_SESSION["newpass_msg"] = "New password don't match with re-writting password";
                            header("Location: passwordChange.php");
                            die();
                        }
                       
                       

                    } 

                } else {
                    $_SESSION["newpass_err_msg"] = "Current password is wrong";
                    header("Location: passwordChange.php");

                }

            } else {

                header("Location: passwordChange.php");

            }
        }


//

?>
</body>

</html>