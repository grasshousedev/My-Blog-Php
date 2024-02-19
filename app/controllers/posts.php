<?php
require_once(ROOT . '/app/database/db.php');
$statusMessage = '';
$id = '';
$title = '';
$content = '';
$category = '';
$categories = selectAny('categories', [], 0);

// Код для формы создания записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
    tt($_POST);
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    tt($_SESSION);
    if ($title === '' || $content === '' || $category = '') {
        $statusMessage = "Не все поля заполнены!";
    } elseif (mb_strlen($title, 'UTF-8') <= 7) {
        $statusMessage = "Заголовок должен быть более 7 символов";
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
        ];
        exit();
        $id = insert('categories', $category);
        $statusMessage = "<i style='color: green; font-weight: bold;'>Категория успешно добавлена</i>";
        header('location: ' . BASE_URL . 'admin/categories/index.php');
    }
} else {
    $name = '';
    $description = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && basename($_SERVER['SCRIPT_FILENAME']) === 'index.php') {
    $categories = selectAny('categories', []);
}
