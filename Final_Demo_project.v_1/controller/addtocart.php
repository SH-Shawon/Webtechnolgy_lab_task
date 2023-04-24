<?php
include "senitize.php";
$pdid = senitize($_GET["productid"]);
if (!isset($_COOKIE['count'])) {
    setcookie("count", 0, time() + 3600, "/");
    $counter = 0;
    setcookie("cart_pdID[" . $counter."]", $pdid, time() + 3600, "/");
} else {
     $counter = senitize($_COOKIE["count"]);
    $counter = $counter + 1;
    setcookie("count", $counter, time() + 3600, "/");
    setcookie("cart_pdID[" . $counter. "]", $pdid, time() + 3600, "/");
}
// var_dump($_COOKIE["cart_pdID"]);

header("location:../view/esitehome.php");
?>
