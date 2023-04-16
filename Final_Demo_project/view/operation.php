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
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operation</title>
</head>

<body>
    <?php include('header.php'); ?>
    <?php
    include "../controller/senitize.php";

    if (isset($_GET['updateid'])) 
        $id = senitize($_GET['updateid']);
        $_SESSION['updateid']= $id;
        
        ?>
        

    <h1 align="center">SSI Computer Shop.</h1>
    <form action="../controller/OperationAction.php" method="post" novalidate>

        <div align="center">
            <table>
                <td></td>
                <td>
                    <fieldset>
                        <legend align="center">Update Price or Quantity for <?php echo $id; ?></legend>
                        <table align="center">
                            <tr>
                                <td>
                                    <label for="addquantity">Add Quantity:</label>
                                </td>
                                <td>
                                    <input type="number" name="addquantity" id="addquantity" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="actualprice">Actual Price:</label>
                                </td>
                                <td>
                                    <input type="actualprice" name="actualprice" id="actualprice">
                                </td>
                            </tr>

                        </table>

                        <p align="center"><input type="submit" value="Update"></p>

                    </fieldset>
                </td>
                <td></td>
            </table>

        </div>

    </form>
    

</body>

</html>