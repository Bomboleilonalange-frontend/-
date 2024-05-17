<?php
require 'php/connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo 'Авторизируйтесь для входа в личный кабинет';
    header('Refresh:2, URL=auth.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$strSQL = "SELECT * FROM users WHERE Id=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();
} else {
    echo 'Ошибка при получении данных о пользователе';
    exit();
}

// Получение записей пользователя из таблицы QuickRecording
$strSQL = "SELECT * FROM QuickRecording WHERE UserId=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$resultQuickRecording = $stmt->get_result();

// Получение записей пользователя из таблицы CM
$strSQL = "SELECT * FROM CM WHERE UserId=?";
$stmt = $connect->prepare($strSQL);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$resultCM = $stmt->get_result();
?>

<html lang="en">
<title>Личный кабинет</title>

<body>
    <section>
        <h1>Личный кабинет</h1>
        <div>
            <h3>Данные о пользователе:</h3>
            <div>
                <p>Логин: <?= $row['Login'] ?></p>
                <p>ФИО: <?= $row['FIO'] ?></p>
                <p>Телефон: <?= $row['Phone'] ?></p>
                <p>Email: <?= $row['Email'] ?></p>
                <p><a href="index.php">Каталог</a></p>
                <p><a href="php/logout.php">Выход</a></p>
                <p><a href="php/account_delete.php">Удалить аккаунт</a></p>
            </div>
        </div>
        <div>
            <h3>Мои записи:</h3>
            <div>
                <h4>Быстрые записи:</h4>
                <?php while ($row = $resultQuickRecording->fetch_assoc()) : ?>
                    <p>Запись на: <?= $row['choice'] ?></p>
                    <p>Комментарий: <?= $row['comment'] ?></p>
                <?php endwhile; ?>

                <h4>Записи на курсы и мастер-классы:</h4>
                <?php while ($row = $resultCM->fetch_assoc()) : ?>
                    <p>Запись на: <?= $row['choice'] ?></p>
                    <p>Комментарий: <?= $row['comment'] ?></p>
                <?php endwhile; ?>
            </div>
            
        </div>
    </section>
</body>

</html>