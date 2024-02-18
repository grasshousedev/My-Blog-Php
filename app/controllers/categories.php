<?php
require_once('../../app/database/db.php');
$statusMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-create'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        $statusMessage = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF-8') <= 2) {
        $statusMessage = "Категория должна быть более 2 символов";
    } elseif (!empty(selectAny('categories', ["name" => $name]))) {
        $statusMessage = "Такая категория уже существует";
    } else {
        $category = [
            'name' => $name,
            'description' => $description,
        ];
        $id = insert('categories', $category);
        $statusMessage = "<i style='color: green; font-weight: bold;'>Категория успешно добавлена</i>";
        header('location: ' . BASE_URL . 'admin/categories/index.php');
    }
} else {
    $name = '';
    $description = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $categories = selectAny('categories', []);
    tt($categories);
}
