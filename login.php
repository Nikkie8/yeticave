<?php
require_once('init.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_data = $_POST;
    $user_email = $user_data['email'];
    $user_password = $user_data['password'];
    $user_registered = search_user($user_email, $users);
    $required = ['email', 'password'];
    $errors = validate_form($user_data, $required);

    if ($user_registered && password_verify($user_password, $user_registered['password'])) {
        $_SESSION['user'] = $user_registered;
        header('Location: /index.php');
    } else {
        $errors['password'] = 'Вы ввели неверный пароль';
    }

    if (count($errors)) {
        $login_content = render_template('templates/login.php', [
            'user_email' => $user_email,
            'errors' => $errors
        ]);
    }
} else {
    $login_content = render_template('templates/login.php');
}

$login_layout = render_template('templates/layout.php', [
    'content' => $login_content,
    'categories' => $categories,
    'user_registered' => $_SESSION['user'],
    'page_title' => 'Вход в систему'
]);

print($login_layout);