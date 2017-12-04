<?php
require_once('functions.php');
require_once('data.php');
require_once('userdata.php');

$required = ['email', 'password'];
$errors = [];
$errorsDictionary = [
    'email' => 'Введите e-mail',
    'password' => 'Введите пароль'
];

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_data = $_POST;
    $user_email = $user_data['email'];
    $user_password = $user_data['password'];
    $user_registered = search_user($user_email, $users);

    foreach ($user_data as $key => $value) {
        if (in_array($key, $required) && $value == '') {
            $errors[$key] = $errorsDictionary[$key];
        }
    }

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
    'page_title' => 'Вход в систему'
]);

print($login_layout);