<?php

require(ROOT . '/app/database/db.php');


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-change-login'])) {
    $login = $_POST['login'];

}