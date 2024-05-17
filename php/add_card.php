<?php
require 'connect.php';

$title = $_POST['title'];
$price = $_POST['price'];

$target_dir = "img/"; // Измените это на путь к вашей папке img
$target_file = $target_dir . basename($_FILES["imgSrc"]["name"]);
$absolute_path = dirname(__FILE__) . "/../" . $target_file; // Замени это когда будешь заливать сайт на хостинг
// // $absolute_path = $_SERVER['DOCUMENT_ROOT'] . $target_file;

if (!move_uploaded_file($_FILES["imgSrc"]["tmp_name"], $absolute_path)) {
    die("Ошибка при загрузке файла: " . $_FILES["imgSrc"]["error"]);
}

$imgSrc = $target_file;

$strSQL = "INSERT INTO Cards (imgSrc, title, price) VALUES (?, ?, ?)";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('ssi', $imgSrc, $title, $price);
$stmt->execute();

header('Location: ../panel.php');
?>














