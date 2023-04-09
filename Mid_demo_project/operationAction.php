<?php session_start(); 

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
    $id = $_SESSION['updateid'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $addquantity = senitize($_POST["addquantity"]);
        $actualprice = senitize($_POST["actualprice"]);
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

            if (!empty($addquantity) && !empty($actualprice)) {
                $sql = "UPDATE product SET actual_price = '$actualprice',available_quantity = available_quantity + '$addquantity' where product_id='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    
                    header("Location: productmanage.php");
                    die();

                } else {
                    header("Location: oprtatione.php");
                    die();
                }

            } else if (!empty($addquantity)) {
                $sql = "UPDATE product SET available_quantity = available_quantity + '$addquantity' where product_id='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: productmanage.php");
                    die();

                } else {
                    header("Location: oprtatione.php");
                    die();
                }

            } else if (!empty($actualprice)) {
                $sql = "UPDATE product SET actual_price = '$actualprice' where product_id='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: productmanage.php");
                    die();

                } else {
                    header("Location: oprtatione.php");
                    die();
                }

            }

        } else {
            header("Location: productmanage.php");

        }


    } else {
        header("Location: productmanage.php");

    }

    ?>
</body>

</html>