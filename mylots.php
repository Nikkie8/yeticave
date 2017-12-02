<?php
require_once('functions.php');
require_once('data.php');

if (isset($_COOKIE['my-lots'])) {
    $my_bets = json_decode($_COOKIE['my-lots'], true);

    $mylots_content = render_template('templates/mylots.php', [
        'my_bets' => $my_bets,
        'items' => $items
    ]);
} else {
    $mylots_content = render_template('templates/mylots.php');
}

$mylots_layout = render_template('templates/layout.php', [
    'content' => $mylots_content,
    'categories' => $categories,
    'page_title' => 'Мои ставки',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($mylots_layout);