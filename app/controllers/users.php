<?php
include('app/database/db.php');

$isSubmit = false;
$errMessage = '';


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if($login === '' || $email === '' || $password === '') {
        $errMessage = "Не все поля заполнены!";
    } elseif(mb_strlen($login, 'UTF-8') <= 4) {
        $errMessage = "Имя пользователя должно быть более 4 символов";
    } else {
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $password
        ];
//        $id = insert('users', $post);
        $isSubmit = true;
        tt($post);
    }

} else {
    echo 'GET METHOD';
}
