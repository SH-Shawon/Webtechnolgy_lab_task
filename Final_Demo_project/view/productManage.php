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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manage</title>
</head>

<body>
    <?php include('header.php'); ?>

    <form action="../controller/productManageAction.php" method="post" novalidate>
        <div>
            <table>
                <td>
                    <fieldset>
                        <legend align="center">Adding New Product</legend>
                        <table>
                            <tr>
                                <td>
                                    <label for="newproduct">New Product:</label>
                                </td>
                                <td>
                                    <input type="text" name="producttype" id="producttype"
                                        placeholder="          Product Type"><br>
                                    <?php echo isset($_SESSION['producttype_err_msg']) ?'<span style="color:red;">' . $_SESSION['producttype_err_msg']."</span>" : ""; ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <input type="text" name="productname" id="productname"
                                        placeholder="          Product Name"><br>
                                    <?php echo isset($_SESSION['productname_err_msg']) ?'<span style="color:red;">' . $_SESSION['productname_err_msg']."</span>" : ""; ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <input type="text" name="companyname" id="companyname"
                                        placeholder="          Company Name">
                                    <br>
                                    <?php echo isset($_SESSION['companyname_err_msg']) ? $_SESSION['companyname_err_msg'] : ""; ?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table>
                            <tr>
                                <td>
                                    <textarea placeholder="Product short description" id="description"
                                        name="description" rows="4" cols="50"></textarea>
                                    <br>
                                    <?php echo isset($_SESSION['description_err_msg']) ? $_SESSION['description_err_msg'] : ""; ?>
                                </td>
                            </tr>
                        </table>

                        <p align="center"><input type="submit" value="Add"></p>

                        <?php echo isset($_SESSION['product_msg']) ? $_SESSION['product_msg'] : ""; ?>
                    </fieldset>
                </td>
                <td></td>
            </table>

        </div>
        <div>

            <?php
            include('displayproduct.php'); ?>
        </div>
    </form>
    <?php unset($_SESSION['product_msg'], $_SESSION['productname_err_msg'], $_SESSION['producttype_err_msg'],
        $_SESSION['companyname_err_msg'],$_SESSION['description_err_msg']); ?>
    <?php include('footer.php'); ?>
</body>

</html>