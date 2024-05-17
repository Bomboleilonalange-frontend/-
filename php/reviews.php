<?php
// Подключение к базе данных
require 'connect.php';
session_start();
// Проверяем соединение
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$response = array();

try {
    // Проверка, была ли отправлена форма
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получение текста отзыва из формы
        $reviewText = $_POST['review-text'];
        
        // Получение имени пользователя и аватарки из сессии или другого источника
        if (!isset($_SESSION['user_id'])) {
            $response['success'] = false;
            $response['message'] = 'Чтобы оставить отзыв, зарегистрируйтесь';
            header('Content-Type: application/json');
            echo json_encode($response); // Возвращаем JSON-ответ
            exit();
        }
        $userId = $_SESSION['user_id'];
        

        // Сохранение отзыва в базе данных
        $stmt = $connect->prepare("INSERT INTO reviews (UserId, Text) VALUES (?, ?)");
        if ($stmt->execute([$userId, $reviewText])) { // где $userId - это идентификатор пользователя, полученный из сессии
            $response['success'] = true;
            $response['message'] = 'Отзыв успешно добавлен';
            
        } else {
            $response['success'] = false;
            $response['message'] = 'Произошла ошибка при добавлении отзыва';
        }

        header('Content-Type: application/json');
        echo json_encode($response); // Возвращаем JSON-ответ
        return;
    }
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = 'Произошла ошибка: ' . $e->getMessage();
    header('Content-Type: application/json');
    echo json_encode($response); // Возвращаем JSON-ответ с сообщением об ошибке
    return;
}
?>
