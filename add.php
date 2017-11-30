<?php
require_once('functions.php');
require_once('data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = $_POST;

    if (isset($_FILES['image']['name'])) {
        $path = 'img/' . $_FILES['image']['name'];
        $res = move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $_FILES['image']['name']);
    }

    if (isset($path)) {
        $item['image'] = $path;
    }

    $add_content = render_template('templates/lot.php', [
        'item' => $item
    ]);
} else {
    $add_content = render_template('templates/add.php');
}

$add_layout = render_template('templates/layout.php', [
    'content' => $add_content,
    'categories' => $categories,
    'page_title' => 'Добавление лота',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($add_layout);