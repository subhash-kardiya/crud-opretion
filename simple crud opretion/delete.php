<?php

$conn = new mysqli("localhost", "root", "", "task1");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: add.php");
exit();
?>

