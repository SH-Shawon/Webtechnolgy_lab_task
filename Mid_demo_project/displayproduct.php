<?php 


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

 ?>
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
                <th>Product ID</th>
                <th>.................Product Info..........</th>
                <th>--Actual Price--</th>
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
                            <?php echo $id ?>
                        </td>
                        <td align="center">
                            <?php echo $producttype . '-' . $productname . '-' . $companyname ?>
                        </td>
                        <td align="center">
                        <?php echo $actualprice ?>
                        </td>
                        <td align="center">
                            <?php echo $availablequantity ?>
                        </td>
                        <td align="center">
                            
                        <button><a href="operation.php?updateid=<?php echo $row['product_id'] ?>">Update</a></button>
             
                        <button><a href="delete.php?deleteid=<?php echo $row['product_id'] ?>">Delete</a></button>

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