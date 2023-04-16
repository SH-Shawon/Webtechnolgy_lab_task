<?php

function emailChecking_1($email)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where  email= ?");
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}


function otpUpdate_2($otp, $email)
{

    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE employee SET otp=? where email= ?");
    $stmt->bind_param("is", $otp, $email);

    if ($stmt->execute()) {
        $flag = true;
    }
    

    return $flag;
}

function passwordUpdate_3($newpass, $email)
{

    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE employee SET password =? where email=?");
    $stmt->bind_param("ss", $newpass, $email);

    if ($stmt->execute()) {
        $flag = true;
    }
    

    return $flag;
}

function otpChecking_4($otp)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where otp=?");
    $stmt->bind_param("s", $otp);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}

function otpApproval_5($otp)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where otp=? AND admin_approval='1'");
    $stmt->bind_param("s", $otp);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}



?>