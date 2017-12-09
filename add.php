<?php
require_once('init.php');


if (!check_auth()) {
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $file = 'name';
    $required = ['lot-name', 'category', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];
    $rules = [
        'lot-rate' => 'validate_price',
        'lot-step' => 'validate_price'
    ];
    $errors = validate_form($lot, $required, $rules);
    $image_path = validate_image($file);

    if (!$image_path) {
        $errors[$file] = 'Загрузите файл';
    } else {
        $lot[$file] = $image_path;
    }

    if (count($errors)) {
        $add_content = render_template('templates/add.php', [
            'item' => $item,
            'errors' => $errors,
            'categories' => $categories
        ]);
    } else {
        // todo: add lot to database here
        $add_content = render_template('templates/lot.php', [
            'lot' => $lot,
            'bets' => $bets
        ]);
    }
} else {
    $add_content = render_template('templates/add.php', [
        'categories' => $categories
    ]);
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