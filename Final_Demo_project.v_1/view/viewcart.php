<?php
// if(isset($_COOKIE["cart_pdID"])){
//     $arr = $_COOKIE["cart_pdID"];
//     foreach ($arr as $element) {
//     echo "$element <br>";
//     }
// }
// else{
//     echo "No item added";
// }

if (isset($_COOKIE["cart_pdID"])) {
    $arr = $_COOKIE["cart_pdID"];
    echo "<table><tr><th style='padding-right: 40px;'>Product ID</th>
    <th style='padding-right: 40px;'>Product Name</th>
    <th style='padding-right: 40px;'>Product Price</th>
    <th style='padding-right: 40px;'>Quantity</th>
    <th>Total Price</th></tr>";
    foreach ($arr as $element) {
        echo "<tr><td>$element</td></tr>";
    }
    echo "</table>";
} else {
    echo "No item added";
}
?>