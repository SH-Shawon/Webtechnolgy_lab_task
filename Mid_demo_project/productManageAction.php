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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $producttype = senitize($_POST["producttype"]);
        $productname = senitize($_POST["productname"]);
        $companyname = senitize($_POST["companyname"]);
        $description = senitize($_POST["description"]);
        $flag = true;


        if (empty($producttype)) {
            $_SESSION["producttype_err_msg"] = "Enter product type";
            $flag = false;
        } else {
            $_SESSION["producttype_err_msg"] = "";
            $_SESSION["producttype"] = $producttype;
        }
        if (empty($productname)) {
            $_SESSION["productname_err_msg"] = "Enter product name";
            $flag = false;
        } else {
            $_SESSION["productname_err_msg"] = "";
            $_SESSION["productname"] = $productname;
        }

        if (empty($companyname)) {
            $_SESSION["companyname_err_msg"] = "Enter company name";
            $flag = false;
        } else {
            $_SESSION["companyname_err_msg"] = "";
            $_SESSION["companyname"] = $companyname;
        }
        if (empty($description)) {
            $_SESSION["description_err_msg"] = "Enter product description";
            $flag = false;
        } else {
            $_SESSION["description_err_msg"] = "";
            $_SESSION["description"] = $description;
        }

        if ($flag) {
            $servername = "localhost";
            $uname = "root";
            $pass = "";
            $dbname = "ssi_inventory";
            $port = "3306";
            $a=rand(1,9999);
            $id = 'PD-' . $a .substr(uniqid(), 0, 2) ;
            


            $conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

            if (!$conn) {
                die("Connection failed:" . mysqli_connect_error());
            }

            
    
            $sql = "INSERT INTO product(product_id, type , name, company_name,description) 
            VALUES('$id','$producttype','$productname','$companyname','$description')";

            $a = mysqli_query($conn, $sql);

            if ($a) {
                $_SESSION['product_msg'] = "product Successfully inserted";
                header("Location: productManage.php");
                die();

            } else {
                $_SESSION['product_err_msg'] = "Error while saving";
                header("Location: productManage.php");
                die();
            }


        }
        else {
            header("Location: productManage.php");
        }


    } else {
        header("Location: productManage.php");
    }
    ?>
</body>

</html>