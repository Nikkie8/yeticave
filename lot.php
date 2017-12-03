<?php
require_once('functions.php');
require_once('data.php');

$item = null;
$my_bets = [];
$errors = [];
$required = ['cost'];
$errorsDictionary = ['cost' => 'Введите ставку'];
$cookie_name = 'my-lots';
$cookie_expire = strtotime('+30 days');
$cookie_path = '/';

// 1 забрать лот id из массива со ставками
// 2 добавить к лоту информацию о том, что ставка подана

if (isset($_COOKIE['my-lots'])) {
    $my_bets = json_decode($_COOKIE[$cookie_name], true);

    foreach ($my_bets as $key => $bet) {
        $items[$bet['lot-id']]['is-bet'] = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['lot_id'])) {
        $lot_id = $_GET['lot_id'];
        $item = $items[$lot_id];
        $item['lot-id'] = $lot_id;
        $lot_content = render_template('templates/lot.php', [
            'item' => $item,
            'bets' => $bets
        ]);
    }

    if (!$item) {
        http_response_code(404);
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bet = $_POST;
    $lot_id = $bet['lot-id'];
    $item = $items[$lot_id];
    $item['lot-id'] = $lot_id;

    foreach ($bet as $key => $value) {
        if (in_array($key, $required)) {
            if (!$value) {
                $errors[$key] = $errorsDictionary[$key];
            }
        }
    }

    if (count($errors)) {
        $lot_content = render_template('templates/lot.php', [
            'item' => $item,
            'bets' => $bets,
            'errors' => $errors
        ]);
    } else {
        $bet['date'] = strtotime('now');
        $my_bets[] = $bet;
        header('Location: /mylots.php');

        $cookie_value = json_encode($my_bets);
        setcookie($cookie_name, $cookie_value, $cookie_expire, $cookie_path);
    }
}

$lot_layout = render_template('templates/layout.php', [
    'content' => $lot_content,
    'categories' => $categories,
    'page_title' => $item['title'],
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($lot_layout);