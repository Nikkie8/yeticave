<?php
require_once('functions.php');
require_once('data.php');

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
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($index_layout);