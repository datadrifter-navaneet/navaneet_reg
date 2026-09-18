<?php

include "db.php";
include "redis.php";
$session_id = $_POST["session_id"];
$age=$_POST["age"];
$dob=$_POST["dob"];
$num=$_POST["num"];
$user_id=$redis->get("session_" . $session_id);
if ($user_id === false) {
    echo "Invalid or expired session!!!";
    exit;}
$bulk=new MongoDB\Driver\BulkWrite();
$filter=["user_id" => (int)$user_id];
$update=[
'$set'=>[
        "user_id" => (int)$user_id,
        "age" => (int)$age,
        "dob" => $dob,
        "phone" => $num]];

$bulk->update($filter, $update, ["upsert" => true]);
try {
    $manager->executeBulkWrite("college_registration.user_profiles",$bulk);
    echo "Profile is updated successfully!";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Profile update failed!!";}?>
