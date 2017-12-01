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
        'image' => 'Загрузите файл в формате jpg/png',
        'lot-rate' => 'Введите начальную цену',
        'lot-step' => 'Введите шаг ставки',
        'lot-date' => 'Введите дату завершения торгов'
    ];
    $errors = [];

    foreach ($item as $key => $value) {
        if (in_array($key, $required)) {
            if (!$value) {
                $errors[$key] = $errorsDictionary[$key];
            }
        }
    }

    if ($item['category'] == 'Выберите категорию') {
        $errors['category'] = $errorsDictionary['category'];
    }

    if (empty($_FILES['image']['name'])) {
        $errors['image'] = $errorsDictionary['image'];
    } else {
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($file_info, $tmp_name);

        if ($file_type !== 'image/jpeg' && $file_type !== 'image/png') {
            $errors['image'] = $errorsDictionary['image'];
        } else {
            $path = 'img/' . $_FILES['image']['name'];
            $res = move_uploaded_file($tmp_name, $path);
            $item['image'] = $path;
        }
    }

    if (count($errors)) {
        $add_content = render_template('templates/add.php', [
            'item' => $item,
            'errors' => $errors,
            'categories' => $categories
        ]);
    } else {
        $add_content = render_template('templates/lot.php', [
            'item' => $item,
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