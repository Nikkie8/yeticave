<?php
require_once('init.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_data = $_POST;
    $user_email = mysqli_real_escape_string($connection, $user_data['email']);
    $user_password = $user_data['password'];
    $sql_user = "SELECT * FROM users WHERE email = '$user_email'";
    $user_registered = get_data($sql_user, $connection);
    $required = ['email', 'password'];
    $errors = validate_form($user_data, $required);

    if ($user_registered && password_verify($user_password, $user_registered[0]['password'])) {
        $_SESSION['user'] = $user_registered[0];
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