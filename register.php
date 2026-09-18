<?php
include "db.php";

$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$reg = $conn->prepare("INSERT INTO users(username, password, email)VALUES(?,?,?)");
$reg->bind_param("sss",$username,$password,$email);
if ($reg->execute()) {
    echo "Registration is successful, THANK YOU!";
} 
else {
    echo "Registration failed: " . $reg->error;}
?>
