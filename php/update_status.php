<?php
require 'connect.php';
session_start();

$id = $_POST['id'];
$status = $_POST['status'];
$table = $_POST['table'];

$strSQL = "UPDATE $table SET status=? WHERE Id=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('si', $status, $id);
$stmt->execute();

header('Location: ../panel.php');
