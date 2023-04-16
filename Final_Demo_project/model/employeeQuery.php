<?php

function passwordChecking_1($username, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where username = ? AND password =?");
    $stmt->bind_param("ss", $username, $password);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}

function loginVerification_2($username, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where username = ? AND password =? AND admin_approval='1'");
    $stmt->bind_param("ss", $username, $password);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}

function editAllInfo_3($address, $phone, $a)
{

    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE employee SET address = ?, phn = ? where username=?");
    $stmt->bind_param("sss", $address, $phone, $a);

    if ($stmt->execute()) {
        $flag = true;
    }

    return $flag;
}

function editPhone_4($phone, $a)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE employee SET phn = ? where username=?");
    $stmt->bind_param("is", $phone, $a);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

function editAddress_5($address, $a)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE employee SET address = ? where username=?");
    $stmt->bind_param("ss", $address, $a);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

function currentPasswordChecking_6($currentpass)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where password =?");
    $stmt->bind_param("s", $currentpass);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}

function updatePassword_7($newpass,$username)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("UPDATE employee SET password =? where username=?");
    $stmt->bind_param("ss", $newpass,$username);
    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}

function usernameChecking_8($username)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where  username= ?");
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}

function nidnumberChecking_9($nidnumber)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("SELECT * FROM employee where  nid= ?");
    $stmt->bind_param("s", $nidnumber);
    if (!$stmt->execute()) {
        die("database error");
    }
    if ($stmt->get_result()->num_rows > 0) {
        $flag = true;
    }
    return $flag;
}


function userInsert_10($username,$fullname,$email,$address,$nidnumber,$phnnumber,$password)
{
    $conn = mysqli_connect("localhost", "root", "", "ssi_inventory", "3306");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $flag = false;
    $stmt = $conn->prepare("INSERT INTO employee(username, fullname , email, address, nid, phn, password) 
    VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiss",$username,$fullname,$email,$address,$nidnumber,$phnnumber,$password);

    if ($stmt->execute()) {
        $flag = true;
    }
    return $flag;
}


?>