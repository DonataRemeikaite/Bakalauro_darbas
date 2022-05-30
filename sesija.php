<?php
session_start();

$servername = "localhost";
$username = "if180029";
$password = "yb*EGYVcWzZL";
$dbname = "if180029";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>