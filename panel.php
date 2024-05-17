<?php
require 'php/connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo 'Авторизируйтесь для входа в панель администратора';
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
    if ($row['status'] != 'admin') {
        echo 'У вас нет прав доступа к панели администратора';
        exit();
    }
} else {
    echo 'Ошибка при получении данных о пользователе';
    exit();
}

$strSQL = "SELECT * FROM users";
$resultUsers = $connect->query($strSQL);

$strSQL = "(SELECT *, 'CM' as table_name FROM CM) UNION ALL (SELECT *, 'QuickRecording' as table_name FROM QuickRecording)";


$resultRecords = $connect->query($strSQL);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/panel.css">
    <title>Панель администратора</title>
</head>

<body>
    <section>
        <h1>Панель администратора</h1>
        <div>
            <h3>Список пользователей:</h3>
            <p><a href="index.php">Каталог</a></p>
            <p><a href="php/logout.php">Выход</a></p>
            <?php
            $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
            ?>

            <div class="users_list">
                <?php while ($row = $resultUsers->fetch_assoc()) : ?>
                    <p>Имя пользователя: <?= $row['Login'] ?></p>
                    <p>Статус: <span id="user-status-<?= $row['Id'] ?>" class="user-status"><?= $row['status'] ?></span></p>
                    <?php if ($userId != $row['Id']) : // Проверяем, не является ли текущий пользователь главным администратором 
                    ?>
                        <a class="change-status" href="php/change_status.php?user_id=<?= $row['Id'] ?>" data-user-id="<?= $row['Id'] ?>">
                            <?= $row['status'] == 'admin' ? 'Лишить права администратора' : 'Дать доступ' ?>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
        <div>
            <h3>Заявки пользователей:</h3>
            <?php while ($row = $resultRecords->fetch_assoc()) : ?>
                <div style="border: 1px solid #000; margin: 10px; padding: 10px;">
                    <p>Имя: <?= $row['name'] ?></p>
                    <p>Номер: <?= $row['phone'] ?></p>
                    <p>Запись на: <?= $row['choice'] ?></p>
                    <p>Комментарий: <?= !empty($row['comment']) ? $row['comment'] : 'Пользователь не оставил комментарий' ?></p>
                    <p>Статус: <?= $row['status'] ?></p>
                    <form action="php/update_status.php" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="table" value="<?= $row['table_name'] ?>">
                        <select name="status">
                            <option value="Заявка требует обработки">Заявка требует обработки</option>
                            <option value="Заявка в обработке">Заявка в обработке</option>
                            <option value="Ожидание ответа от клиента">Ожидание ответа от клиента</option>
                            <option value="Заявка обработана">Заявка обработана</option>
                            <option value="Заявка закрыта">Заявка закрыта</option>
                        </select>
                        <input type="submit" value="Обновить статус">
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
        <div>
            <h3>Добавить новый мастер класс:</h3>
            <form action="php/add_card.php" method="post" enctype="multipart/form-data">
                <label for="imgSrc">Изображение:</label><br>
                <input type="file" id="imgSrc" name="imgSrc"><br>
                <label for="title">Название:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="price">Цена:</label><br>
                <input type="text" id="price" name="price"><br>
                <input type="submit" value="Добавить карточку">
            </form>
        </div>

    </section>
    <script src="js/panel.js"></script>
</body>

</html>