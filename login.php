<?php
include "db.php";
include "redis.php";
$username=$_POST["username"];
$password=$_POST["password"];

$log=$conn->prepare("SELECT id,username FROM users WHERE username =? AND password =?");
$log->bind_param("ss",$username,$password);

$log->execute();
$result = $log->get_result();

if ($result->num_rows == 1) {
$user = $result->fetch_assoc();
$session_id = uniqid();

$redis->set("session_" . $session_id, $user["id"]);
echo $session_id;

} else {
echo "Invalid username or password!!!";}
?>