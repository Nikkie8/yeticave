<?php
require_once('functions.php');
require_once('data.php');

$page_content = render_template('templates/index.php', [
    'categories' => $categories,
    'items' => $items,
    'lot_time_remaining' => $lot_time_remaining
]);

$layout = render_template('templates/layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'page_title' => 'YetiCave',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($layout);