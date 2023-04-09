<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php include('header_2.php'); ?>
    <form action="loginAction.php" method="post" novalidate>

        <div align="center">
            <table>
                <td></td>
                <td>
                    <fieldset>
                        <legend align="center">Login</legend>
                        <?php echo isset($_SESSION['registration_msg']) ? $_SESSION['registration_msg'] : ""; ?>
                        <table align="center">

                            <tr>
                                <td>
                                    <label for="username">Username:</label>
                                </td>
                                <td>
                                    <input type="text" name="username" id="username" value="<?php echo
                                        isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>">
                                    <?php echo isset($_SESSION['username_err_msg']) ? $_SESSION['username_err_msg'] : ""; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Password:</label>
                                </td>
                                <td>
                                    <input type="password" name="password" id="password">
                                    <?php echo isset($_SESSION['password_err_msg']) ? $_SESSION['password_err_msg'] : ""; ?>
                                </td>
                            </tr>

                        </table>
                       <p> <?php echo isset($_SESSION['username_password_err_msg']) ? $_SESSION['username_password_err_msg'] : ""; ?></p>
                       <p><?php echo isset($_SESSION['admin_approval_err_msg']) ? $_SESSION['admin_approval_err_msg'] : "";

                        session_destroy(); ?></p>

                        <p align="center"><input type="submit" value="Login"></p>

                        <p align="center"><a href="forgotPassword.php">forgot your password?</a></p>
                    </fieldset>
                </td>
                <td></td>
            </table>

        </div>

    </form>
    <p align="center">Don't have an account?Register <a href="registration.php">here</a></p>


</body>

</html>