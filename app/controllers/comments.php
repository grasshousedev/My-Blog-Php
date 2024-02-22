<?php
// Контроллер коментариев

$statusMessage = [];
$id_post = $_GET['post'];
$comment = '';
$comments = selectAny('comments', ['status'=>1]);

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
    if(isset($posts_pending)) {
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
            'id_post' => $id_post
        ];
        $post_id = insert('comments', $post);
        $email = '';
        $comment = '';
        if(isset($_SESSION['admin'])) {
            $statusMessage[] = "<i style='color:green;'>Комментарий успешно добавлен</i>";
        } else {
            $statusMessage[] = "<i style='color:green;'>Комментарий будет опубликован после проверки</i>";
        }
    }
} else {
    $email = '';
    $comment = '';
}