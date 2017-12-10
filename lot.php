<?php
require_once('init.php');

$lot = null;
$my_bets = [];
$user_registered = check_auth();
$errors = [];
$required = ['cost'];
$rules = ['cost' => 'validate_price'];
$errorsDictionary = ['cost' => 'Введите ставку'];
$cookie_name = 'my-lots';
$cookie_expire = strtotime('+30 days');
$cookie_path = '/';

if (isset($_COOKIE['my-lots'])) {
    $my_bets = json_decode($_COOKIE[$cookie_name], true);

    foreach ($my_bets as $key => $bet) {
        $items[$bet['lot-id']]['is-bet'] = true;
    }
}

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];
    $lot = [];

    foreach ($lots as $key => $item) {
        if ($item['id'] == $lot_id) {
            $lot = $item;
            break;
        }
    }

    $sql_bets = 'SELECT bets.id as bet_id, bets.date, bets.price, users.name as user_name FROM bets
                 JOIN users ON bets.user_id = users.id
                 JOIN lots ON bets.lot_id = lots.id
                 WHERE lot_id = ' . $lot_id;
    $bets = get_data($sql_bets, $connection);

    $lot_content = render_template('templates/lot.php', [
        'lot' => $lot,
        'bets' => $bets,
        'user_registered' => $user_registered
    ]);
}

if (isset($_POST['lot-id'])) {
    $bet = $_POST;
    $lot_id = $bet['lot-id'];
    $item = $items[$lot_id];
    $item['lot-id'] = $lot_id;

    foreach ($bet as $key => $value) {
        if (in_array($key, $required) && $value == '') {
            $errors[$key] = $errorsDictionary[$key];
        }

        if (key_exists($key, $rules)) {
            $result = call_user_func($rules[$key], $value);

            if (!$result) {
                $errors[$key] = $errorsDictionary[$key];
            }
        }
    }

    if (count($errors)) {
        $lot_content = render_template('templates/lot.php', [
            'item' => $item,
            'bets' => $bets,
            'errors' => $errors,
        ]);
    } else {
        $bet['date'] = strtotime('now');
        $my_bets[] = $bet;
        header('Location: /mylots.php');

        $cookie_value = json_encode($my_bets);
        setcookie($cookie_name, $cookie_value, $cookie_expire, $cookie_path);
    }
}

if (!$lot) {
    http_response_code(404);
    exit();
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