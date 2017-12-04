<?php
require_once('functions.php');
require_once('data.php');

session_start();

$user_registered = [];

if (isset($_SESSION['user'])) {
    $user_registered = $_SESSION['user'];
}

$index_content = render_template('templates/index.php', [
    'categories' => $categories,
    'items' => $items
]);

$index_layout = render_template('templates/layout.php', [
    'is_index' => true,
    'main_class' => 'container',
    'content' => $index_content,
    'categories' => $categories,
    'page_title' => 'YetiCave',
    'user_registered' => $user_registered
]);

print($index_layout);