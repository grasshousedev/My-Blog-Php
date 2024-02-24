<?php

require(ROOT . '/app/database/db.php');
$statusMessage = [];


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-change-login'])) {
    $login = $_POST['login'];
    $user = selectAny('users', ['username' => $login], 1);
    if(!$user || $user['id'] === $_POST['id']) {
        update('users', $_POST['id'], ['username' => $login]);
    } else {
        $statusMessage[] = 'Имя пользователя уже используется';
    }
}
elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-change-email'])) {
    $email = $_POST['email'];
    $user = selectAny('users', ['email' => $email], 1);
    if(!$user || $user['id'] === $_POST['id']) {
        update('users', $_POST['id'], ['email' => $email]);
    } else {
        $statusMessage[] = 'Почта уже используется';
    }
}