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
    include "../model/productQuery.php";

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
            $a=rand(1,9999);
            $id = 'PD-' . $a .substr(uniqid(), 0, 2) ;
    
            if (insertProduct_4($id,$producttype,$productname,$companyname,$description)) {
                $_SESSION['product_msg'] = "product Successfully inserted";
                header("Location: ../view/productManage.php");
                die();

            } else {
                $_SESSION['product_err_msg'] = "Error while saving";
                header("Location: ../view/productManage.php");
                die();
            }


        }
        else {
            header("Location: ../view/productManage.php");
        }


    } else {
        header("Location: ../view/productManage.php");
    }
    ?>
</body>

</html>