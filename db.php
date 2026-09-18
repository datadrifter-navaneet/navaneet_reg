<?php

$conn = new mysqli("localhost", "root", "Navaneet@3", "registration_system", 3307);
$manager = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>