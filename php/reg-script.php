<?php
require 'connect.php';
session_start();

$Login = mysqli_real_escape_string($connect, $_POST['Login']);
$Password = $_POST['Password'];
$FIO = mysqli_real_escape_string($connect, $_POST['FIO']);
$Phone = mysqli_real_escape_string($connect, $_POST['Phone']);
$Email = mysqli_real_escape_string($connect, $_POST['Email']);
$Hach = password_hash($Password, PASSWORD_DEFAULT);

// Путь к дефолтной аватарке
$target_dir = "img/"; // Измените это на путь к вашей папке img
$defaultAvatar = $target_dir . 'Defoult.png';

$query = "SELECT * FROM users WHERE Login ='$Login' OR Email = '$Email'";
$user = mysqli_fetch_assoc(mysqli_query($connect, $query));

$response = array();

if(empty($user)){
    $sql = "INSERT INTO users ( Login, Password, FIO, Phone, Email, Avatar) VALUES ('$Login', '$Hach', '$FIO', '$Phone', '$Email', '$defaultAvatar')";
    if($connect->query($sql) === TRUE ){
        $response['success'] = true;
        $response['message'] = 'Регистрация прошла успешно';
    } else{
        $response['success'] = false;
        $response['message'] = 'Ошибка';
    }
} else{
    $response['success'] = false;
    $response['message'] = 'Пользователь с таким логином или адресом электронной почты уже существует';
}

$connect->close();

// Возвращаем JSON ответ
echo json_encode($response);


// require 'connect.php';
// session_start();

// $Login = mysqli_real_escape_string($connect, $_POST['Login']);
// $Password = $_POST['Password'];
// $FIO = mysqli_real_escape_string($connect, $_POST['FIO']);
// $Phone = mysqli_real_escape_string($connect, $_POST['Phone']);
// $Email = mysqli_real_escape_string($connect, $_POST['Email']);
// $Hach = password_hash($Password, PASSWORD_DEFAULT);

// // Путь к дефолтной аватарке
// $defaultAvatar = 'img\\Defoult.png';

// $query = "SELECT * FROM users WHERE Login ='$Login' OR Email = '$Email'";
// $user = mysqli_fetch_assoc(mysqli_query($connect, $query));

// $response = array();

// if(empty($user)){
//     $sql = "INSERT INTO users ( Login, Password, FIO, Phone, Email, Avatar) VALUES ('$Login', '$Hach', '$FIO', '$Phone', '$Email', '$defaultAvatar')";
//     if($connect->query($sql) === TRUE ){
//         $response['success'] = true;
//         $response['message'] = 'Регистрация прошла успешно';
//     } else{
//         $response['success'] = false;
//         $response['message'] = 'Ошибка';
//     }
// } else{
//     $response['success'] = false;
//     $response['message'] = 'Пользователь с таким логином или адресом электронной почты уже существует';
// }

// $connect->close();

// // Возвращаем JSON ответ
// echo json_encode($response);


// require 'connect.php';
// session_start();

// $Login = mysqli_real_escape_string($connect, $_POST['Login']);
// $Password = $_POST['Password'];
// $FIO = mysqli_real_escape_string($connect, $_POST['FIO']);
// $Phone = mysqli_real_escape_string($connect, $_POST['Phone']);
// $Email = mysqli_real_escape_string($connect, $_POST['Email']);
// $Hach = password_hash($Password, PASSWORD_DEFAULT);

// // Путь к дефолтной аватарке
// $defaultAvatar = 'img\\Defoult.png';

// $query = "SELECT * FROM users WHERE Login ='$Login' OR Email = '$Email'";
// $user = mysqli_fetch_assoc(mysqli_query($connect, $query));

// $response = array();

// if(empty($user)){
//     $sql = "INSERT INTO users ( Login, Password, FIO, Phone, Email, Avatar) VALUES ('$Login', '$Hach', '$FIO', '$Phone', '$Email', '$defaultAvatar')";
//     if($connect->query($sql) === TRUE ){
//         $response['success'] = true;
//         $response['message'] = 'Регистрация прошла успешно';
//     } else{
//         $response['success'] = false;
//         $response['message'] = 'Ошибка';
//     }
// } else{
//     $response['success'] = false;
//     $response['message'] = 'Пользователь с таким логином или адресом электронной почты уже существует';
// }

// $connect->close();

// // Возвращаем JSON ответ
// echo json_encode($response);


// require 'connect.php';
// session_start();

// $Login = mysqli_real_escape_string($connect, $_POST['Login']);
// $Password = $_POST['Password'];
// $FIO = mysqli_real_escape_string($connect, $_POST['FIO']);
// $Phone = mysqli_real_escape_string($connect, $_POST['Phone']);
// $Email = mysqli_real_escape_string($connect, $_POST['Email']);
// $Hach = password_hash($Password, PASSWORD_DEFAULT);

// $query = "SELECT * FROM users WHERE Login ='$Login' OR Email = '$Email'";
// $user = mysqli_fetch_assoc(mysqli_query($connect, $query));

// $response = array();

// if(empty($user)){
//     $sql = "INSERT INTO users ( Login, Password, FIO, Phone, Email) VALUES ('$Login', '$Hach', '$FIO', '$Phone', '$Email')";
//     if($connect->query($sql) === TRUE ){
//         $response['success'] = true;
//         $response['message'] = 'Регистрация прошла успешно';
//     } else{
//         $response['success'] = false;
//         $response['message'] = 'Ошибка';
//     }
// } else{
//     $response['success'] = false;
//     $response['message'] = 'Пользователь с таким логином или адресом электронной почты уже существует';
// }

// $connect->close();

// // Возвращаем JSON ответ
// echo json_encode($response);

?>




