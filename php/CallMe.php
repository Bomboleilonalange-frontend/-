<?php
require 'connect.php';
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$name = $_POST['name'];
$phone = $_POST['phone'];
$sql = "INSERT INTO CallUs (phone, name)
VALUES ('$phone', '$name')";

if ($connect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>
