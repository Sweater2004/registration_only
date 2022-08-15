<?php
session_start();
require_once 'conect.php';
$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
$passworld = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
$email = filter_var(trim($_POST['email']), FILTER_UNSAFE_RAW);
$dop_pass = filter_var(trim($_POST['dop_password']), FILTER_UNSAFE_RAW);

if (mb_strlen($passworld) < 1 || mb_strlen($name) < 1 || mb_strlen($email) < 1) {
    $_SESSION['message'] = "заполните все поля";
    header('Location: /');
    exit();
} elseif (mb_strlen($name) < 1 || mb_strlen($name) > 30) {
    $_SESSION['message'] = "недопустимое длинна имени от 1 до 30 символов";
    header('Location: /');
    exit();
} elseif (mb_strlen($passworld) < 8 || mb_strlen($passworld) > 20) {
    $_SESSION['message'] = "недопустимое длинна пароля от 8 до 20 символов";
    header('Location: /');
    exit();
} elseif (mb_strlen($email) < 1 || mb_strlen($email) > 255) {
    $_SESSION['message'] = "недопустимое длинна email от 1 до 255 символов";
    header('Location: /');
    exit();
} elseif ($passworld != $dop_pass) {
    $_SESSION['message'] = "поля пароля должны быть одинаковые";
    header('Location: /');
    exit();
} else {
    $asd = mysqli_query($conect, "SELECT * FROM `users` WHERE `email`='$email'");
    $chek_users = mysqli_num_rows($asd);
    if ($chek_users == 0) {
        mysqli_query($conect, "INSERT INTO `users` (`name`, `email`, `passworld`) VALUES ('$name', '$email', '$passworld')");
        $_SESSION['message'] = "вы успешно зарегистрировались";
        header('Location: ../vhod.php');
    } else {
        $_SESSION['message'] = "такой пользователь уже есть";
        header('Location: /');
    }
}
