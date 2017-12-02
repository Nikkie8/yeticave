<?php
require_once('functions.php');
require_once('data.php');

$item = null;
$my_bets = [];
$cookie_name = 'my-lots';
$cookie_expire = strtotime('+30 days');
$cookie_path = '/';

if (isset($_COOKIE['my-lots'])) {
    $my_bets = json_decode($_COOKIE[$cookie_name], true);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['lot_id'])) {
        $lot_id = $_GET['lot_id'];
        $item = $items[$lot_id];
    }

    if (!$item) {
        http_response_code(404);
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bet = $_POST;
    $bet['date'] = strtotime('now');
    $lot_id = $bet['lot-id'];
    $my_bets[] = $bet;
    header('Location: /mylots.php');
}

$cookie_value = json_encode($my_bets);

setcookie($cookie_name, $cookie_value, $cookie_expire, $cookie_path);

$lot_content = render_template('templates/lot.php', [
    'item' => $item,
    'bets' => $bets
]);

$lot_layout = render_template('templates/layout.php', [
    'content' => $lot_content,
    'categories' => $categories,
    'page_title' => $item['title'],
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($lot_layout);