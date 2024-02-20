<?php
require_once ( ROOT . '/app/database/db.php');
if(!$_SESSION) {
    header('location: ' . BASE_URL . 'auth.php');
}
$statusMessage = '';

// Код для перехода со страницы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $statusMessage = checkInput();
    if($statusMessage == '') {
        $admin = 0;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $password
        ];
        tt($post);
        exit();
        $id = insert('users', $post);
        $user = selectAny('users', ['id' => $id]);
        createUserSession($user);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {
    tt($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    if ($login === '' || $password === '') {
        $statusMessage = "Не все поля заполнены!";
    } else {
        $user = selectAny('users', ["username" => $login], 1);
        if ($user && password_verify($password, $user['password'])) {
            createUserSession($user);
        } else {
            $statusMessage = "Имя пользователя или пароль введены неверно";
        }
    }
}
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $login = '';
    $email = '';
}

function checkInput() {
    $statusMessage = '';
    if ($_POST['login'] === '' || $_POST['email'] === '' || $_POST['password'] === '') {
        $statusMessage = "Не все поля заполнены!";
    } elseif (!empty(selectAny('users', ['email' => $_POST['email']]))) {
        $statusMessage = "Пользователь с таким email уже существует";
    } elseif (!empty(selectAny('users', ['username' => $_POST['login']]))) {
        $statusMessage = "Это имя пользователя уже используется";
    } elseif (mb_strlen($_POST['login'], 'UTF-8') <= 4) {
        $statusMessage = "Имя пользователя должно быть более 4 символов";
    } elseif ($_POST['password'] !== $_POST['password_check']) {
        $statusMessage = "Введенные пароли не совпадают";
    }
    return $statusMessage;
}

function createUserSession($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    } else {
        header('location: ' . BASE_URL);
    }
}