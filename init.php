<?php
require_once('functions.php');
require_once('mysql_helper.php');

$connection = mysqli_connect('127.0.0.1', 'root', 'shell', 'yeticave');
mysqli_set_charset($connection, 'utf8');

//$categories = [];

if (!$connection) {
    $error = mysqli_connect_error();

    $error_content = render_template('templates/error.php', [
        'error' => $error
    ]);

    $error_layout = render_template('templates/layout.php', [
        'content' => $error_content,
        'categories' => $categories,
        'main_class' => 'container',
        'page_title' => 'Ошибка'
    ]);

    print($error_layout);
    exit();
} else {
    // do queries

}

date_default_timezone_set('Europe/Moscow');