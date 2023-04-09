<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="forgotPasswordAction.php" method="post" novalidate>

        <div align="center">
            <table>
                <td></td>
                <td>
                <?php echo isset($_SESSION['otp_err_msg']) ? $_SESSION['otp_err_msg'] : ""; ?>
                <br>
                    <fieldset>
                        <legend>Password Recovering</legend>
                        <table align="center">

                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                </td>
                                <td>
                                    <input type="email" name="email" id="email" value="<?php echo 
                                    isset($_SESSION['email'])? $_SESSION['email'] : "" ?>">
                                    <?php echo isset($_SESSION['email_err_msg'])? $_SESSION['email_err_msg'] : ""; ?>
                                </td>
                            </tr>                           
                        </table>
                        
                        <p align="center"><input type="submit" value="Submit"></p>
                    </fieldset>
                </td>
                <td></td>
            </table>

        </div>

    </form>
    <p align="center">Remember password?Back to <a href="http://localhost/Mid_demo_project/login.php">login</a> Page</p>


</body>

</html>