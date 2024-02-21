<?php
require_once(ROOT . '/app/database/db.php');
if (str_contains($_SERVER['SCRIPT_FILENAME'], 'admin')) {
    if ($_SESSION['admin'] == 0) {
        header('location: ' . BASE_URL . 'auth.php');
    }
}
$statusMessage = [];
$categories = selectAny('categories', [], 0);
$posts = selectAllFromPostsWithUsers('posts', 'users');

// Код для формы создания записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
    try {
        $img = checkImage();
    } catch (Exception $e) {
        $statusMessage[] = $e->getMessage();
    }
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $id_category = trim($_POST['category']);
    $status = isset($_POST['status']) ? 1 : 0;
    $statusMessage = array_merge($statusMessage, checkInput($title, $content, $id_category));

    if (!count($statusMessage)) {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'status' => $status,
            'id_category' => $id_category,
        ];
        $id = insert('posts', $post);
        $post = selectAny('posts', ['id' => $id], 1);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $id = '';
    $title = '';
    $content = '';
    $status = '';
    $id_category = '';
}

// Обновление статьи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
    $post = [];
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $id_category = trim($_POST['category']);
    $status = isset($_POST['status']) ? 1 : 0;
    if (!empty($_FILES['img']['name'])) {
        try {
            $img = checkImage();
            $post = array_merge($post, ['img' => $img]);
        } catch (Exception $e) {
            $statusMessage[] = $e->getMessage();
        }
    }
    $statusMessage = array_merge($statusMessage, checkInput($title, $content, $id_category));
    if (!count($statusMessage)) {
        $post = array_merge($post, [
            'id' => $id,
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'status' => $status,
            'id_category' => $id_category,
        ]);
        update('posts', $id, $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else {
    $title = '';
    $content = '';
    $status = isset($_POST['status']) ? 1 : 0;
    $id_category = '';
}

// Получение данных при нажатии кнопки изменения статьи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectAny('posts', ['id' => $_GET['id']], 1);
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $id_category = $post['id_category'];
    $status = $post['status'];
}

// Функция для переключения метки опубликовано (status)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['status']))
{
    update('posts', $_GET['id'], ['status'=>$_GET['status']]);
    header("location: " . BASE_URL . "/admin/posts/index.php");
}

// Удаление статьи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('posts', ['id' => $id]);
    header("location: " . BASE_URL . "/admin/posts/index.php");
}

// Функция для проверки значений, которые в нее передаются
function checkInput($title, $content, $id_category)
{
    $statusMessage = [];
    if ($title === '' || $content === '' || $id_category === '') {
        $statusMessage[] = "Не все поля заполнены!";
    } elseif (mb_strlen($title, 'UTF-8') <= 7) {
        $statusMessage[] = "Заголовок должен быть более 7 символов";
    }
    return $statusMessage;
}

// Функция для проверки изображения
function checkImage()
{
    tt($_FILES);
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . '_' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT . "\assets\images\posts\\" . $imgName;
        if (strpos($fileType, 'image') === false) {
            throw new Exception("Файл не является изображением");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) {
                $_POST['img'] = $imgName;
                return trim($_POST['img']);
            } else {
                throw new Exception("Ошибка загрузки изображения на сервер");
            }
        }
    } else {
        throw new Exception("Ошибка получения изображения");
    }
}