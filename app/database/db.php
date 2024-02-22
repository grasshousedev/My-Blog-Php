<?php

session_start();
require("connect.php");

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}


// Проверка запроса к базе данных
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение определенного количества данных с одной таблицы
function selectAny($table, $params = [], $number = 0)
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE `$key` = '$value'";
            } else {
                $sql = $sql . " AND `$key` = '$value'";
            }
            $i++;
        }
    }
    if($number != 0)
        $sql = $sql . " LIMIT $number";


    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
    if ($number === 1) {
        return $query->fetch();
    }
    return $query->fetchAll();
}

// Вставка в таблицу
function insert($table, $params)
{
    global $pdo;
    $keys = "";
    $values = "";
    foreach ($params as $key => $value) {
        $keys = $keys . " `$key`,";
        $values = $values . " '$value',";
    }
    // Удаляет лишнюю запятую в конце
    $keys = substr_replace($keys, "", -1);
    $values = substr_replace($values, "", -1);

    $sql = "INSERT INTO `$table` ($keys) VALUES($values)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// Функция для обновления по id
function update($table, $id, $params)
{
    global $pdo;
    $sql = "UPDATE `$table` SET ";
    foreach ($params as $key => $value) {
        $sql = $sql . " `$key` = '$value',";
    }
    // Удаляет лишнюю запятую в конце
    $sql = substr_replace($sql, "", -1);
    $sql = $sql . " WHERE `id` = $id";
    print($sql);
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Функция для удаления по параметру
function delete($table, $param)
{
    global $pdo;
    foreach ($param as $key => $value)
        $sql = "DELETE FROM `$table` WHERE `$key` = '$value'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Выборка записей с автором в админку, $params = параметры, которые должны быть соблюдены в первой таблице

function selectAllFromPostsWithUsers($table_posts, $table_users, $params = []) {
    global $pdo;
    $sql = "
    SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_category,
    t1.created_date,
    t2.username
    FROM `$table_posts` AS t1 JOIN $table_users AS t2 ON t1.id_user = t2.id";
    if($params) {
        $i = 0;
        foreach($params as $key => $value) {
            if($i === 0) {
                $sql .= " WHERE t1.`$key` = '$value'";
            } else {
                $sql .= " AND t1.`$key` = '$value'";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

function searchInTitleAndContent($text, $table_first, $table_second) {
    $text = trim(strip_tags(htmlspecialchars($text)));
    global $pdo;
    $sql = "SELECT
        posts.*, users.username
        FROM $table_first as posts
        JOIN $table_second as users
        ON posts.id_user = users.id
        WHERE posts.title LIKE '%$text%'
        OR posts.content LIKE '%$text%'
    ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}