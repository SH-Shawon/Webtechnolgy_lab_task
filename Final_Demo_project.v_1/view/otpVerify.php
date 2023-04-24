<?php

session_start();
if(!isset($_SESSION['passwordstatus'])){
    session_destroy();
    header("location: forgotPassword.php");
    die();
}

if(!$_SESSION['passwordstatus']){
    session_destroy();
    header("location: forgotPassword.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP verification</title>
</head>

<body>
    <?php include('header_2.php'); ?>
    <form action="../controller/otpVerifyAction.php" method="post" novalidate>
    
        <div align="center">
            <table>
                <td></td>
                <td>
                    <fieldset>
                        <legend>Verify OTP</legend>
                        <table align="center">

                            <tr>
                                <td>
                                    <label for="otp">OTP from Mail:</label>
                                </td>
                                <td>
                                    <input type="number" name="otp" id="otp">
                                </td>
                            </tr>                           
                        </table>
                        
                        <?php echo isset($_SESSION['admin_approval_err_msg']) ?'<span style="color:red;">' . $_SESSION['admin_approval_err_msg']."</span>": "";?>
                        
                        <p align="center"><input type="submit" value="Submit"></p>
                        <?php echo isset($_SESSION['otp_err_msg']) ?'<span style="color:red;">' . $_SESSION['otp_err_msg']."</span>": ""; ?>
                    </fieldset>
                </td>
                <td></td>
            </table>

        </div>

    </form>
    <p align="center">Don't receive mail? <a href="../view/forgotPassword.php">try again</a> </p>
    <?php unset($_SESSION["otp_err_msg"],$_SESSION["admin_approval_err_msg"]) ?>

</body>

</html>