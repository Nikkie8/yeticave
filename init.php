<?php
require_once('functions.php');
require_once('mysql_helper.php');

$connection = mysqli_connect('127.0.0.1', 'root', 'shell', 'yeticave');
mysqli_set_charset($connection, 'utf8');
date_default_timezone_set('Europe/Moscow');

$categories = [];
$lots = [];

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
    $sql_categories = 'SELECT `name`, `modifier` FROM categories';
    $categories = get_data($sql_categories, $connection);

    $sql_lots = 'SELECT lots.id, lots.name, categories.name as category, creation_date, image, description, price, end_date FROM lots JOIN categories ON lots.category_id = categories.id';
    $lots = get_data($sql_lots, $connection);
}