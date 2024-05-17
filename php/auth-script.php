<?php
require 'connect.php';
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

$getUserQuery = "SELECT * FROM users WHERE Login = '$login'";
$getUserResult = $connect->query($getUserQuery);

if ($getUserResult->num_rows > 0) {
    $user = $getUserResult->fetch_assoc();

    if (password_verify($pass, $user['Password'])) {
        $_SESSION['user_id'] = $user['Id'];
        $_SESSION['login'] = $user['Login'];
        $_SESSION['status'] = $user['status'];

        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['status'] == 'admin') {
                header('Refresh: 1; URL=../panel.php');
            } else {
                header('Refresh: 1; URL=../cabinet.php');
            }
            echo 'Вход успешен';
        } else {
            echo 'Сессия не открыта';
        }
    } else {
        echo 'Неверный пароль';
    }
} else {
    echo 'Пользователь не найден';
}
?>
<!-- 
// require 'connect.php';
// session_start();
// // Подключение 

// $login = $_POST['login'];
// $pass = $_POST['pass'];
// // Получение данных

// $getUserQuery = "SELECT * FROM users WHERE Login = '$login'";
// $getUserResult = $connect->query($getUserQuery);

// if ($getUserResult->num_rows > 0) {
//     $user = $getUserResult->fetch_assoc();


//     if (password_verify($pass, $user['Password'])) {
//         session_start();
//         $_SESSION['user_id'] = $user['Id'];
//         $_SESSION['login'] = $user['Login'];

//         if (isset($_SESSION['user_id'])) {
//             header('Refresh: 1; URL=../cabinet.php');
//             echo 'Вход успешен';
//         } else {
//             echo 'Сессия не открыта';
//         }
//     } else {
//         echo 'Неверный пароль';
//     }
// } else {
//     echo 'Пользователь не найден';
// } -->
