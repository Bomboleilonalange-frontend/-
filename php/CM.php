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
  die("Администраторы не могут записываться на курсы или мастер-классы.");
}


$name = $_POST['name'];
$phone = $_POST['phone'];
$course = $_POST['choice'];
$message = $_POST['comment'];

$sql = "INSERT INTO CM (UserId, name, phone, choice, comment) VALUES (?, '$name', '$phone', '$course', '$message')";

$stmt = $connect->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  die("New record created successfully");
} else {
  die("Error: " . $stmt->error);
}

$connect->close();

?>

<!-- // require 'connect.php';
// // Создаем соединение

// // Проверяем соединение
// if ($connect->connect_error) {
//   die("Connection failed: " . $connect->connect_error);
// }
// $course = $_POST['cm'];
// $name = $_POST['name'];
// $phone = $_POST['phone'];
// $message = $_POST['comment'];

// $sql = "INSERT INTO CM (cm, name, phone, comment)
// VALUES ('$course', '$name', '$phone', '$message')";

// if ($connect->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $connect->error;
// }

// $connect->close();
Только для не авторизованного пользователя









// session_start();
// require 'connect.php';

// $userId = $_SESSION['user_id']; // Получаем ID пользователя из сессии
// $course = $_POST['cm'];
// $name = $_POST['name'];
// $phone = $_POST['phone'];
// $message = $_POST['comment'];

// $sql = "INSERT INTO CM (UserId, cm, name, phone, comment)
// VALUES ('$userId', '$course', '$name', '$phone', '$message')";

// if ($connect->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $connect->error;
// }

// $connect->close();
только для авторизованного пользователя
?> -->