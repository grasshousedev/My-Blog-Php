<?php
// Контроллер коментариев
require_once(ROOT . "/app/database/db.php");
if (str_contains($_SERVER['SCRIPT_FILENAME'], 'admin')) {
    if ($_SESSION['admin'] == 0) {
        tt($_SESSION);
        header('location: ' . BASE_URL . 'auth.php');
    }
}

$statusMessage = [];
$email = '';
$comment = '';
$id_post = '';

// После нажатия кнопки отправить комментарий
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-comment'])) {
    $status = 0;

    $comment = trim($_POST['comment']);
    if(isset($_POST['id_user'])) {
        $email = selectAny('users', ['id' => $_POST['id_user']], 1)['email'];
        if(isset($_SESSION['admin'])) {
            $status = 1;
        }
    } else {
        $email = $_POST['email'];
        $posts_pending = selectAny('comments', ['email' => $email, 'status' => 0]);
    }
    if(isset($posts_pending) && $posts_pending) {
        $statusMessage[] = "Ваш предыдущий комментарий ожидает модерации";
    }
    elseif($comment == '' || $email == '') {
        $statusMessage[] = "Не все поля заполнены";
    } elseif(iconv_strlen($comment) < 2) {
        $statusMessage[] = "Комментарий слишком короткий";
    } elseif(!$statusMessage) {
        $post = [
            'status' => $status,
            'email' => $email,
            'comment' => $comment,
            'id_post' => $_GET['post']
        ];
        $post_id = insert('comments', $post);
    }
    $comments = selectCommentsWithUsers('comments', 'users', ['id'=>$_GET['post'], 'status'=>1]);
    header("location:" . BASE_URL . "single.php?post=" . $_GET['post']);
}

elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-moderate'])) {
    $status = isset($_POST['publish']) ? 1 : 0;
    update('comments', $_POST['id'], ['status'=>$status]);
    header("location: " . BASE_URL . "admin/comments/index.php");
}

elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-delete'])) {
    tt($_POST);
    delete('comments', ['id' => $_POST['id']]);
    header("location:" . BASE_URL . "admin/comments/index.php");
}
// Получить комментарии в админке
elseif($_SERVER['REQUEST_METHOD'] === "GET" && basename($_SERVER['SCRIPT_FILENAME']) === 'index.php'){
    $comments = selectAllCommentsWithPosts('comments', 'posts');
}
elseif($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
    $object = selectCommentsWithUsers('comments', 'users', ['id'=>$_GET['id']])[0];
    $comment = $object['comment'];
    $email = $object['email'];
    $title = selectAny('posts', ['id'=>$object['id_post']], 1)['title'];
    $id_post = $object['id_post'];
    $id = $object['id'];
    $status = $object['status'];
}
// Получить комментарии на странице поста
elseif ($_SERVER['REQUEST_METHOD'] === "GET" && str_contains($_SERVER['REQUEST_URI'], 'single')) {
    $id_post = $_GET['post'];
    $comments = selectCommentsWithUsers('comments', 'users', ['id_post'=>$id_post, 'status'=>1]);
}