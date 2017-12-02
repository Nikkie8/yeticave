<?php
require_once('functions.php');
require_once('data.php');

$mylots_content = render_template('templates/mylots.php');

$mylots_layout = render_template('templates/layout.php', [
    'content' => $mylots_content,
    'categories' => $categories,
    'page_title' => 'Мои ставки',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($mylots_layout);