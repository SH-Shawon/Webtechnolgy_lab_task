<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile edit</title>
    <style>
        .btn:hover{
            color:blue;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <form action="../controller/editProfileAction.php" method="post" novalidate>

        <div align="center">
            <fieldset>
                <legend align="center">Profile Edit</legend>
                <table>
                    <td></td>
                    <td>

                        <table align="center">

                            <tr>
                                <td>
                                    <label for="number">New Phone:</label>
                                </td>
                                <td>
                                    <input type="phone" name="phone" id="phone">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="address">New Address:</label>
                                </td>
                                <td>
                                    <input type="text" name="address" id="address">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="pass">Your Passsword:</label>

                                </td>
                                <td>
                                    <input type="text" name="pass" id="pass">
                                    <?php echo isset($_SESSION['pass_err_msg']) ? '<span style="color:red;">' . $_SESSION['pass_err_msg'] . "</span>" : ""; 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <?php echo isset($_SESSION['edit_info_msg']) ? '<span style="color:blue;">' . $_SESSION['edit_info_msg'] . '</span>' : ""; ?>
                                    <?php unset($_SESSION['pass_err_msg']);
                                    unset($_SESSION['edit_info_msg']); ?>
                                    <p align="center"><input type="submit" value="Save"  class="btn"></p>
                                </td>
                            </tr>
                    </td>
                    <td></td>
                </table>

            </fieldset>
        </div>
        <?php include('footer.php'); ?>
    </form>



</body>



</html>