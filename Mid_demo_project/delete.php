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

    if (isset($_GET['deleteid'])) {
        $id = senitize($_GET['deleteid']);


        $servername = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "ssi_inventory";
        $port = "3306";

        $conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

        if (!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }

        $sql = "DELETE FROM product WHERE product_id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $msg = "delete_msg_".$id;
            $_SESSION[$msg] = "Product successfully deleted";
            
            header("Location: productmanage.php");
            die();

        } else {
            $_SESSION['delete_msg'] = "Product can't deleted.Try again";
            header("Location: productmanage.php");
            die();
        }

    }
    else{
        header("Location: productmanage.php");

    }
