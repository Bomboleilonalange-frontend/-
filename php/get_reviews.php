<?php
session_start();
require 'connect.php';
// Проверяем соединение
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT reviews.Id, reviews.Text, users.Login, users.Avatar, users.status FROM reviews INNER JOIN users ON reviews.UserId = users.Id";

$result = $connect->query($sql);

$reviews = [];
while ($row = $result->fetch_assoc()) {
  $reviews[] = $row;
}

header('Content-Type: application/json');
echo json_encode($reviews); // Возвращаем отзывы в формате JSON

$connect->close();

?>
