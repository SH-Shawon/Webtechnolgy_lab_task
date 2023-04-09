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
</head>

<body>
    <?php include('header.php'); ?>
    <form action="editProfileAction.php" method="post" novalidate>

        <div align="center">
        <fieldset>
                        <legend align="center">Profile Edit</legend>
            <table>
                <td></td>
                <td>
                   
                        <table align="center">

                            <tr>
                                <td>
                                    <label for="number">Phone:</label>
                                </td>
                                <td>
                                    <input type="phone" name="phone" id="phone">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="address">Address:</label>
                                </td>
                                <td>
                                    <input type="text" name="address" id="address">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="pass">Passsword:</label>
                                    
                                </td>
                                <td>
                                    <input type="text" name="pass" id="pass">
                                    <?php echo isset($_SESSION['pass']) ? $_SESSION['pass'] : "";
                                     ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><p align="center"><input type="submit" value="Save"></p></td>
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
