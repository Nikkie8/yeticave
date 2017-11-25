<?php
require_once('functions.php');
require_once('data.php');

$item = null;

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    foreach ($items as $key => $lot) {
        if ($key == $lot_id) {
            $item = $lot;
            break;
        }
    }
}

if (!$item) {
    http_response_code(404);
}

$lot_content = render_template('templates/lot.php', [
    'item' => $item
]);

$lot_layout = render_template('templates/layout.php', [
    'content' => $lot_content,
    'categories' => $categories,
    'page_title' => $item['title'],
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($lot_layout);