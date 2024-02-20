<?php
require_once(ROOT . '/app/database/db.php');
$statusMessage = '';
$categories = selectAny('categories', [], 0);
$posts = selectAny('posts', [], 0);

// Код для формы создания записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $img = trim($_POST['img']);
    $category = trim($_POST['category']);
    $status = isset($_POST['status']) ? 1 : 0;

    if ($title === '' || $content === '' || $category === '') {
        $statusMessage = "Не все поля заполнены!";
    } elseif (mb_strlen($title, 'UTF-8') <= 7) {
        $statusMessage = "Заголовок должен быть более 7 символов";
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'status' => $status,
            'id_category' => $category,
        ];
        $id = insert('posts', $post);
        $post = selectAny('posts', ['id' => $id], 1);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $title = '';
    $content = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && basename($_SERVER['SCRIPT_FILENAME']) === 'index.php') {
    $categories = selectAny('categories', []);
}
