<?php
$pdid=senitize($_GET["productid"]);
setcookie("productid",$pdid,time()+3600);
header("location:esitehome.php");