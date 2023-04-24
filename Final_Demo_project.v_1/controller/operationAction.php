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
    include "../model/productQuery.php";
    $id = $_SESSION['updateid'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $addquantity = senitize($_POST["addquantity"]);
        $actualprice = senitize($_POST["actualprice"]);
        $flag = true;

    
        if ($flag) {
            if (!empty($addquantity) && !empty($actualprice)) {
                if (updateBoth_1($actualprice, $addquantity, $id)) {
                    
                    header("Location: ../view/productmanage.php");
                    die();

                } else {
                    header("Location: ../view/operation.php");
                    die();
                }

            } else if (!empty($addquantity)) {
                if (updateQuantity_2($addquantity, $id)) {
                    header("Location: ../view/productmanage.php");
                    die();

                } else {
                    header("Location: ../view/operation.php");
                    die();
                }

            } else if (!empty($actualprice)) {
                
                if (updatePrice_3($actualprice,$id)) {
                    header("Location: ../view/productmanage.php");
                    die();

                } else {
                    header("Location: ../view/operation.php");
                    die();
                }
            }
            else{
                header("Location: ../view/operation.php");
                    die();
            }

        } else {
            header("Location: ../view/productmanage.php");

        }


    } else {
        header("Location: ../view/productmanage.php");

    }

    ?>
</body>

</html>