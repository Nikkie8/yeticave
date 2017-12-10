<?php
require_once('init.php');

$sql_categories = 'SELECT `name`, `modifier` FROM categories';
$categories = get_data($sql_categories, $connection);

$signup_content = render_template('templates/signup.php');

$signup_layout = render_template('templates/layout.php', [
    'content' => $signup_content,
    'categories' => $categories,
    'page_title' => 'Регистрация'
]);

print($signup_layout);