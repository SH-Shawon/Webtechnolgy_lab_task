<?php include('header3.php'); ?>

<?php

$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "ssi_inventory";
$port = "3306";

$conn = mysqli_connect($servername, $uname, $pass, $dbname, $port);

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
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
    <fieldset>
        <table>
            <tr>
                <th>Product Name</th>
                <th>.................Product Type..........</th>
                <th>--Price--</th>
                <th>..Availavle Quantity..</th>
                <th>........Operation........</th>
            </tr>

            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['product_id'];
                    $producttype = $row['type'];
                    $productname = $row['name'];
                    $companyname = $row['company_name'];
                    $description = $row['description'];
                    $actualprice = $row['actual_price'];
                    $availablequantity = $row['available_quantity'];
                    // $addquantity = $row['add_quantity'];
                    ?>
                    <tr>
                        <td>
                            <?php echo $productname ?>
                        </td>
                        <td align="center">
                            <?php echo $producttype ?>
                        </td>
                        <td align="center">
                        <?php echo $actualprice ?>
                        </td>
                        <td align="center">
                            <?php echo $availablequantity ?>
                        </td>
                        <td align="center">
             
                        <button><a href="addtocart.php?productid=<?php echo $row['product_id'] ?>">Add to cart</a></button>

                        </td>
                    </tr>
                <?php
                }
            }
            ?>

        </table>
    </fieldset>
</body>

</html>