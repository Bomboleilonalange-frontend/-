<?php

session_start();
require 'connect.php';

$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$targetUserId = $_GET['user_id']; // Получаем ID пользователя, которого нужно обновить

// Получаем статус текущего пользователя
$strSQL = "SELECT status FROM users WHERE Id=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$userStatus = $result->fetch_assoc()['status'];

$response = array();

// Проверяем, является ли текущий пользователь главным администратором
if ($userId == 21 && $userStatus == 'admin') {
    // Проверяем, не пытается ли главный администратор изменить свой собственный статус
    if ($userId == $targetUserId) {
        $response['message'] = "Главный администратор не может изменить свой собственный статус.";
    } else {
        // Получаем статус целевого пользователя
        $strSQL = "SELECT status FROM users WHERE Id=?";
        $stmt = $connect->prepare($strSQL);
        $stmt->bind_param('i', $targetUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        $targetUserStatus = $result->fetch_assoc()['status'];

        // Меняем статус целевого пользователя
        $newStatus = $targetUserStatus == 'admin' ? 'user' : 'admin';
        $strSQL = "UPDATE users SET status=? WHERE Id=?";
        $stmt = $connect->prepare($strSQL);
        $stmt->bind_param('si', $newStatus, $targetUserId);
        $stmt->execute();

        $response['message'] = "Статус пользователя успешно обновлен";
    }
} else {
    $response['message'] = "У вас нет прав для изменения статуса этого пользователя";
}

header('Content-Type: application/json');
echo json_encode($response);

$connect->close();
