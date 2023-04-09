<?php 

session_start();

if(!isset($_SESSION['loginstatus'])){
    session_destroy();
    header("location: login.php");
    die();
}
if(!$_SESSION['loginstatus']){
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


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $phone = senitize($_POST["phone"]);
        $address = senitize($_POST["address"]);
        $password = senitize($_POST["pass"]);
        $flag = true;
        


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
            
           

            $sql_5 = "SELECT * FROM employee where username= '$a' AND password='$password'";
            $result = mysqli_query($conn, $sql_5);
           
                 
            if (mysqli_num_rows($result) > 0) {
                echo "h";
            

                

                if (!empty($phone) && !empty($address)) {
                    $sql = "UPDATE employee SET address = '$address',phn = '$phone' where username='$a'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        header("Location: productmanage.php");
                        die();

                    } else {
                        header("Location: editProfile.php");
                        die();
                    }

                } else if (!empty($phone)) {
                    $sql = "UPDATE employee SET phn = '$phone' where username='$a'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("Location: productmanage.php");
                        die();

                    } else {
                        header("Location: editProfile.php");
                        die();
                    }

                } else if (!empty($address)) {
                    $sql = "UPDATE employee SET address = '$address' where username='$a'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("Location: productmanage.php");
                        die();

                    } else {
                        header("Location: editProfile.php");
                        die();
                    }
                } else {
                    header("Location: editProfile.php");

                }



            } else {
                $_SESSION["pass_err_msg"] = "Incorrect Password";
                header("Location: editProfile.php");

            }


        } else {
            header("Location: productmanage.php");

        }
    }

    ?>
</body>

</html>