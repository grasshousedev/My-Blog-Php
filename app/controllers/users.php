<?php
require_once(ROOT . '/app/database/db.php');

if (str_contains($_SERVER['SCRIPT_FILENAME'], 'admin')) {
    if ($_SESSION['admin'] == 0) {
        header('location: ' . BASE_URL . 'auth.php');
    }
}
$statusMessage = [];
$users = selectAny('users', []);

// Код для перехода со страницы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $statusMessage = array_merge($statusMessage, checkInput());
    if (!empty(selectAny('users', ['email' => $_POST['email']]))) {
        $statusMessage[] = "Пользователь с таким email уже существует";
    }
    if (!empty(selectAny('users', ['username' => $_POST['login']]))) {
        $statusMessage[] = "Это имя пользователя уже используется";
    }
    if (!count($statusMessage)) {
        $admin = 0;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $password
        ];
        $id = insert('users', $post);
        $user = selectAny('users', ['id' => $id], 1);
        createUserSession($user);
    }
} // Создание пользователя в админ-панели
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $admin = $_POST['admin'];
    $statusMessage = array_merge($statusMessage, checkInput());
    if (!empty(selectAny('users', ['email' => $_POST['email']]))) {
        $statusMessage[] = "Пользователь с таким email уже существует";
    }
    if (!empty(selectAny('users', ['username' => $_POST['login']]))) {
        $statusMessage[] = "Это имя пользователя уже используется";
    }
    if (!count($statusMessage)) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $password,
        ];
        $id = insert('users', $post);
        $user = selectAny('users', ['id' => $id], 1);
        header('location: ' . BASE_URL . '/admin/users/index.php');
    }
} // Авторизация пользователя
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    if ($login === '' || $password === '') {
        $statusMessage[] = "Не все поля заполнены!";
    } else {
        $user = selectAny('users', ["username" => $login], 1);
        if ($user && password_verify($password, $user['password'])) {
            createUserSession($user);
        } else {
            $statusMessage[] = "Имя пользователя или пароль введены неверно";
        }
    }
}
// Редактирование пользователя в админ-панели
elseif($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-user'])) {
    $post = [];
    $id = $_POST['id'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    if($_POST['password'] != '') {
        $statusMessage = array_merge($statusMessage, checkInput());
        $post = ['password' => password_hash($_POST['password'],PASSWORD_DEFAULT)];
    } else {
        $statusMessage = array_merge($statusMessage, checkInput(false));
    }
    $newMail = selectAny('users', ['email' => $email], 1);
    $newLogin = selectAny('users', ['username' => $login], 1);
    if($newMail && $newMail['id'] != $id) {
        $statusMessage[] = "Почта занята";
    }
    if($newLogin && $newLogin['id'] != $id) {
        $statusMessage[] = "Имя пользователя занято";
    }
    if(!count($statusMessage)) {
        $post = array_merge($post, [
            'admin' => $_POST['admin'],
            'username' => $login,
            'email' => $email,
            ]);
        update('users', $id, $post);
        header("location: " . BASE_URL . "/admin/users/index.php");
    }
}
// Получение информации для редактирования в админ-панели
elseif ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])){
    $id = $_GET['id'];
    $user = selectAny('users', ['id'=>$id], 1);
    $login = $user['username'];
    $email = $user['email'];
    $admin = $user['admin'];

}
// Удаление пользователя в админ-панели
elseif ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    delete('users', ['id' => $delete_id]);
    header("location: " . BASE_URL . "/admin/users/index.php");
} else {
    $login = '';
    $email = '';
    $admin = '';
}

function checkInput(bool $checkPass = true) : array
{
    $statusMessage = [];
    if($checkPass) {
        if ($_POST['login'] === '' || $_POST['email'] === '' || $_POST['password'] === '') {
            $statusMessage[] = "Не все поля заполнены!";
        }
    } else {
        if ($_POST['login'] === '' || $_POST['email'] === '') {
            $statusMessage[] = "Не все поля заполнены!";
        }
    }
    if (mb_strlen($_POST['login'], 'UTF-8') <= 4) {
        $statusMessage[] = "Имя пользователя должно быть более 4 символов";
    }
    if ($_POST['password'] !== $_POST['password_check']) {
        $statusMessage[] = "Введенные пароли не совпадают";
    }
    return $statusMessage;
}

function createUserSession($user) : void
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