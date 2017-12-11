<?php
require_once('init.php');

$user_registered = check_auth();
$user_id = intval($user_registered['id']);

if (!$user_registered) {
    http_response_code(403);
    exit();
}

$sql_categories = 'SELECT `name`, `modifier` FROM categories';
$categories = get_data($sql_categories, $connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lot = $_POST;
    $file = 'image';
    $category = mysqli_escape_string($connection, $lot['category']);
    $required = ['lot-name', 'category', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];
    $rules = [
        'lot-rate' => 'validate_price',
        'lot-step' => 'validate_price'
    ];
    $errors = validate_form($lot, $required, $rules);
    $image_path = validate_image($file);
    $sql_lot_category_id = "SELECT id FROM categories WHERE name = '$category'";
    $category_id = get_data($sql_lot_category_id, $connection)[0]['id'];

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
        $sql = 'INSERT INTO lots (creation_date, name, description, image, price, end_date, rate_step, owner_id, category_id) VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, 'sssisiii', $lot['lot-name'], $lot['message'], $image_path, $lot['lot-rate'], $lot['lot-date'], $lot['lot-step'], $user_id, $category_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $lot_id = mysqli_insert_id($connection);
            header('Location: /lot.php?lot_id=' . $lot_id);
        }
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