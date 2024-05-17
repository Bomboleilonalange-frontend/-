<?php
require 'connect.php';
// Проверяем соединение
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
$category = $_GET['category']; // Получаем категорию из параметров запроса

$sql = "SELECT url FROM Photos WHERE category = ?";
$stmt = $connect->prepare($sql); 
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$images = [];
while ($row = $result->fetch_assoc()) {
  $images[] = $row;
}

header('Content-Type: application/json');
echo json_encode($images); // Возвращаем изображения в формате JSON

$connect->close();
?>
