<?php
require_once('functions.php');
require_once('data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = $_POST;
    $required = ['lot-name', 'category', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];
    $errorsDictionary = [
        'lot-name' => 'Введите наименование лота',
        'category' => 'Выберите категорию',
        'message' => 'Напишите описание лота',
        'image' => '',
        'lot-rate' => 'Введите начальную цену',
        'lot-step' => 'Введите шаг ставки',
        'lot-date' => 'Введите дату завершения торгов'
    ];
    $errors = [];

    foreach ($item as $key => $value) {
        if (in_array($key, $required)) {
            if (!$value || $item['category'] == 'Выберите категорию') {
                $errors[$key] = $errorsDictionary[$key];
            }
        }
    }

    if (isset($_FILES['image']['name'])) {
        $path = 'img/' . $_FILES['image']['name'];
        $res = move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $_FILES['image']['name']);
    }

    if (isset($path)) {
        $item['image'] = $path;
    }

    if (count($errors)) {
        $add_content = render_template('templates/add.php', [
            'item' => $item,
            'errors' => $errors
        ]);
    } else {
        $add_content = render_template('templates/lot.php', [
            'item' => $item
        ]);
    }
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