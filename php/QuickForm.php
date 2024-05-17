<?php

session_start();
require 'connect.php';

$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

// Получаем статус пользователя
$strSQL = "SELECT status FROM users WHERE Id=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$userStatus = $result->fetch_assoc()['status'];

// Проверяем, является ли пользователь администратором
if ($userStatus == 'admin') {
    die("Администраторы не могут записываться через эту форму.");
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$choice = $_POST['choice'];
$comment = $_POST['comment'];

if (!empty($name) && !empty($phone) && !empty($choice) && !empty($comment)) {
    $sql = "INSERT INTO QuickRecording (UserId, name, phone, choice, comment) VALUES (?, '$name', '$phone', '$choice', '$comment')";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        die("Новая запись успешно создана");
    } else {
        die("Ошибка: " . $stmt->error);
    }
} else {
    die("Пожалуйста, заполните все поля формы.");
}

$connect->close();

?>
<!-- // session_start();
// require 'connect.php';
// $name = $_POST['name'];
// $phone = $_POST['phone'];
// $choice = $_POST['choice'];
// $comment = $_POST['comment'];

// if (!empty($name) && !empty($phone) && !empty($choice) && !empty($comment)) {
//     $sql = "INSERT INTO QuickRecording (name, phone, choice, comment) VALUES ('$name', '$phone', '$choice', '$comment')";

//     if ($connect->query($sql) === TRUE) {
//         echo "Новая запись успешно создана";
//     } else {
//         echo "Ошибка: " . $sql . "<br>" . $connect->error;
//     }
// } else {
//     echo "Пожалуйста, заполните все поля формы.";
// }


// $connect->close();
Только для не авторизованного пользователя 













// session_start();
// require 'connect.php';

// $userId = $_SESSION['user_id']; // Получаем ID пользователя из сессии
// $name = $_POST['name'];
// $phone = $_POST['phone'];
// $choice = $_POST['choice'];
// $comment = $_POST['comment'];

// if (!empty($name) && !empty($phone) && !empty($choice) && !empty($comment)) {
//     $sql = "INSERT INTO QuickRecording (UserId, name, phone, choice, comment) VALUES ('$userId', '$name', '$phone', '$choice', '$comment')";

//     if ($connect->query($sql) === TRUE) {
//         echo "Новая запись успешно создана";
//     } else {
//         echo "Ошибка: " . $sql . "<br>" . $connect->error;
//     }
// } else {
//     echo "Пожалуйста, заполните все поля формы.";
// }

// $connect->close();

Только для  авторизованного пользователя 



 -->




