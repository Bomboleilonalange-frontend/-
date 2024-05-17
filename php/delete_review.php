<?php

session_start();
require 'connect.php';

$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$reviewId = $_GET['review_id']; // Получаем ID отзыва из запроса

// Получаем статус текущего пользователя
$strSQL = "SELECT status FROM users WHERE Id=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$userStatus = $result->fetch_assoc()['status'];

$response = array();

// Проверяем, является ли текущий пользователь администратором
if ($userStatus == 'admin') {
    // Удаляем отзыв из базы данных
    $strSQL = "DELETE FROM reviews WHERE Id=?";
    $stmt = $connect->prepare($strSQL);
    $stmt->bind_param('i', $reviewId);
    $stmt->execute();

    $response['message'] = "Отзыв успешно удален";
    $response['success'] = true;
} else {
    $response['message'] = "У вас нет прав для удаления этого отзыва";
    $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);

$connect->close();

?>
