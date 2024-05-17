<?php
session_start();
// Начало сессии (если не начата)
unset($_SESSION['user_id']);
// Удаление значение переменной user_id из сессии с помощью unset
$_SESSION['user_id'] = false;
// Присваивание user_id значения false.
header('Location: ../index.php') 
// Перенаправление в index.php с помощью header
?>