<?php
include('app/database/db.php');

$statusMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password_check = trim($_POST['password_check']);

    if ($login === '' || $email === '' || $password === '') {
        $statusMessage = "Не все поля заполнены!";
    } elseif (!empty(selectAny('users', ['email' => $email]))) {
        $statusMessage = "Пользователь с таким email уже существует";
    } elseif (!empty(selectAny('users', ['username' => $login]))) {
        $statusMessage = "Это имя пользователя уже используется";
    } elseif (mb_strlen($login, 'UTF-8') <= 4) {
        $statusMessage = "Имя пользователя должно быть более 4 символов";
    } elseif ($password !== $password_check) {
        $statusMessage = "Введенные пароли не совпадают";
    } else {
        $password_hashed = password_hash($password_check, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $password_hashed
        ];
        $id = insert('users', $post);
        $statusMessage = "<span style='color: green; font-size: 18px;''>Пользователь <strong> $login </strong> успешно зарегистрирован!</span>";
    }

} else {
    $login = '';
    $email = '';
}
