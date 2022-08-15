<?php
session_start();
require_once 'conect.php';
$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
$passworld = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
$email = filter_var(trim($_POST['email']), FILTER_UNSAFE_RAW);

if (mb_strlen($passworld) < 1 || mb_strlen($name) < 1 || mb_strlen($email) < 1) {
    $_SESSION['message'] = "заполните все поля";
    header('Location: ../vhod.php');
    exit();
} else {
    $asd = mysqli_query($conect, "SELECT * FROM `users` WHERE `email`='$email' AND  `name`='$name' AND `passworld`='$passworld'");
    $chek_users = mysqli_num_rows($asd);
    if ($chek_users == 0) {
        $_SESSION['message'] = "Не верные данные авторизации";
        header('Location: ../vhod.php');
    } else {
        $_SESSION['message'] = "здравствуйте, $name";
        header('Location: ../vhod.php');
    }
}
