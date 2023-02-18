<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    setcookie("color", "", time() - 3600);
    header("location:cookies.php");
}
?>