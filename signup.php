<?php
require_once('init.php');

$sql_categories = 'SELECT `name`, `modifier` FROM categories';
$categories = get_data($sql_categories, $connection);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_data = $_POST;
    $file = 'avatar';
    $user_email = mysqli_real_escape_string($connection, $user_data['email']);
    $sql_user = "SELECT id FROM users WHERE email = '$user_email'";
    $is_registered = get_data($sql_user, $connection);
    $required = ['email', 'password', 'name', 'contacts'];
    $rules = ['email' => 'validate_email'];
    $errors = validate_form($user_data, $required, $rules);
    $image_path = validate_image($file);

    if ($is_registered) {
        $errors['email'] = 'Пользователь с таким e-mail уже зарегистрирован';
    }

    if (count($errors)) {
        $signup_content = render_template('templates/signup.php', [
            'user_data' => $user_data,
            'errors' => $errors
        ]);
    } else {
        // todo: insert data into database
        header('Location: /login.php');
    }
} else {
    $signup_content = render_template('templates/signup.php');
}

$signup_layout = render_template('templates/layout.php', [
    'content' => $signup_content,
    'categories' => $categories,
    'page_title' => 'Регистрация'
]);

print($signup_layout);