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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_data = $_POST;

    foreach ($user_data as $key => $value) {
        if (in_array($key, $required) && $value == '') {
            $errors[$key] = $errorsDictionary[$key];
        }
    }

    if (count($errors)) {
        $login_content = render_template('templates/login.php', [
            'errors' => $errors
        ]);
    } else {
        $login_content = render_template('templates/login.php');
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