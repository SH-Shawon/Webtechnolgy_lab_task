<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php include('header_2.php'); ?>

    <form action="registrationAction.php" method="post" novalidate>

        <div align="center">
            <table>
                <td></td>
                <td>
                    <fieldset>
                        <legend>Provide Information</legend>
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
                                    <label for="fullname">Full Name:</label>
                                </td>
                                <td>
                                    <input type="text" name="fullname" id="fullname" value="<?php echo
                                        isset($_SESSION['fullname']) ? $_SESSION['fullname'] : "" ?>">
                                    <?php echo isset($_SESSION['fullname_err_msg']) ? $_SESSION['fullname_err_msg'] : ""; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                </td>
                                <td>
                                    <input type="email" name="email" id="email" value="<?php echo
                                        isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                                    <?php echo isset($_SESSION['email_err_msg']) ? $_SESSION['email_err_msg'] : ""; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="address">Address:</label>
                                </td>
                                <td>
                                    <input type="text" name="address" id="address" value="<?php echo
                                        isset($_SESSION['address']) ? $_SESSION['address'] : "" ?>">
                                    <?php echo isset($_SESSION['address_err_msg']) ? $_SESSION['address_err_msg'] : ""; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nidnumber">NID Number:</label>
                                </td>
                                <td>
                                    <input type="number" name="nidnumber" id="nidnumber" value="<?php echo
                                        isset($_SESSION['nidnumber']) ? $_SESSION['nidnumber'] : "" ?>">
                                    <?php echo isset($_SESSION['nidnumber_err_msg']) ? $_SESSION['nidnumber_err_msg'] : ""; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phnnumber">Phone Number:</label>
                                </td>
                                <td>
                                    <input type="number" name="phnnumber" id="phnnumber" value="<?php echo
                                        isset($_SESSION['phnnumber']) ? $_SESSION['phnnumber'] : "" ?>">
                                    <?php echo isset($_SESSION['phnnumber_err_msg']) ? $_SESSION['phnnumber_err_msg'] : ""; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Password:</label>
                                </td>
                                <td>
                                    <input type="password" name="password" id="password" value="<?php echo
                                        isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                                    <?php echo isset($_SESSION['password_err_msg']) ? $_SESSION['password_err_msg'] : ""; ?>
                                </td>
                            </tr>

                        </table>

                        <?php echo isset($_SESSION['username_err_msg']) ? $_SESSION['username_err_msg'] : "";
                        session_destroy(); ?>

                        <p align="center"><input type="submit" value="submit"></p>
                        
                        <?php echo isset($_SESSION['registration_msg']) ? $_SESSION['registration_msg'] : ""; ?>
                    </fieldset>
                </td>
                <td></td>
            </table>

        </div>

    </form>
    <p align="center">Already have an account?Login <a href="http://localhost/Mid_demo_project/login.php">here</a></p>

   

</body>

</html>

