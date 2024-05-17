<?php
require 'connect.php';
// Подключение БД
session_start();
// Начало сессии

// Проверка есть ли в переменной значение user_id значит
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Присваивание переменной значения user_id
    $sql = "DELETE FROM users WHERE Id = '$user_id'";
    // SQl запрос для удаления значения из БД для указанного пользователя
    if (mysqli_query($connect, $sql)) {
        // Условие если запрос успешен и функция  mysqli_query нашла con и sql значит
        echo 'Аккаунт удален';
        // Сообщение
        session_destroy();
        // Сброс сессии 
        header('Refresh: 2; URL=../index.php');
    }
}
mysqli_close($connect)
// Закрытие соединения с базой данных с помощью mysqli_close
?>

