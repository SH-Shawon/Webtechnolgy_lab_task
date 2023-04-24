<?php

function updateBoth_1($actualprice, $addquantity, $id)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE product SET actual_price = ?,available_quantity = available_quantity + ? where product_id=?");
    $stmt->bind_param("dis", $actualprice, $addquantity, $id);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

function updateQuantity_2($addquantity, $id)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE product SET available_quantity = available_quantity + ? where product_id=?");
    $stmt->bind_param("is", $addquantity, $id);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

function updatePrice_3($actualprice,$id)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE product SET actual_price = ? where product_id=?");
    $stmt->bind_param("ds", $actualprice,$id);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

function insertProduct_4($id,$producttype,$productname,$companyname,$description)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("INSERT INTO product(product_id, type , name, company_name,description) 
    VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss",$id,$producttype,$productname,$companyname,$description);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

?>