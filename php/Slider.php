<?php
require 'connect.php';
// Создаем соединение

// Проверяем соединение
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
// Выполняем SQL-запрос
$sql = "SELECT imgSrc, title, price, Technique, CanvasSize, Duration, Persons FROM Cards";
$result = $connect->query($sql);

$allCardsData = array();

if ($result->num_rows > 0) {
    // Преобразуем каждую строку результата в ассоциативный массив и добавляем его в allCardsData
    while ($row = $result->fetch_assoc()) {
        $allCardsData[] = $row;
    }
}
header('Content-Type: application/json');
echo json_encode($allCardsData);

$connect->close();


?>

