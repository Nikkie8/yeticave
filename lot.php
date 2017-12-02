<?php
require_once('functions.php');
require_once('data.php');

$item = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['lot_id'])) {
        $lot_id = $_GET['lot_id'];
        $item = $items[$lot_id];
    }

    if (!$item) {
        http_response_code(404);
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bet = $_POST;
    $bet['date'] = strtotime('now');
    $bet['formatted-date'] = date('d.m.y', $bet['date']);
    $lot_id = $bet['lot-id'];
    $item = $items[$lot_id];

    print_r($bet);
}

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