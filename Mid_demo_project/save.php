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

    if (isset($_GET['saveinfo'])) {
        $id = senitize($_GET['id']);
        $actualprice = senitize($_GET['actualprice']);
        $addquantity = senitize($_GET['addquantity']);


        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "ssi_inventory";
        $port = "3306";

        $conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

        if (!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }

        $sql = "UPDATE product SET actual_price='$actualprice',add_quantity='$addquantity' where id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: productmanage.php");
            die();

        } else {
            header("Location: productmanage.php");
            die();
        }

    }
    else{
        header("Location: productmanage.php");

    } 
