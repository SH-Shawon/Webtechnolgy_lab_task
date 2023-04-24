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
    <title>Document</title>
</head>
<body>

    <form action="../controller/passwordResetAction.php" method="post" novalidate>

    <table>
        <tr>
            <td>
                <label for="npass">New Password</label>
            </td>
            <td>
                <input type="password" id="npass" name="npass" value="<?php echo
                  isset($_SESSION["npass"]) ? $_SESSION["npass"] : "" ?>">
                <p> <?php echo isset($_SESSION['newpassb_msg']) ?'<span style="color:red;">' . $_SESSION['newpassb_msg']."</span>" : ""; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="rpass">Confirm Password</label>
            </td>
            <td>
                <input type="password" id="rpass" name="rpass" value="<?php echo
                  isset($_SESSION["rpass"]) ? $_SESSION["rpass"] : "" ?>">
                <p> <?php echo isset($_SESSION['newpassc_msg']) ?'<span style="color:red;">' . $_SESSION['newpassc_msg']."</span>" : ""; ?></p>
            </td>
        </tr>
    </table>
    <p><input type="submit" value="Save"></p>
    <p> <?php echo isset($_SESSION['newpass_msg']) ?'<span style="color:blue;">' . $_SESSION['newpass_msg']."</span>" : ""; ?></p>
    <p> <?php echo isset($_SESSION['newpass_err_msg']) ?'<span style="color:red;">' . $_SESSION['newpass_err_msg']."</span>" : ""; ?></p>
    
    
</body>
</html>
<?php unset($_SESSION["npass"],$_SESSION["rpass"],$_SESSION['newpassc_msg']); 
unset($_SESSION["newpass_msg"],$_SESSION['newpassb_msg'],$_SESSION["newpass_err_msg"]);?>