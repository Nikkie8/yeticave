<?php
require_once('init.php');

$sql_categories = 'SELECT `name`, `modifier` FROM categories';
$categories = get_data($sql_categories, $connection);
$lot = null;
$user_registered = check_auth();
$user_id = $user_registered['id'];

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    $sql_lot = 'SELECT lots.id, lots.name, categories.name as category, creation_date, image, description, price, end_date, rate_step FROM lots 
                JOIN categories ON lots.category_id = categories.id
                WHERE lots.id = ' . $lot_id;
    $lot = get_data($sql_lot, $connection);

    $sql_bets = 'SELECT bets.id as bet_id, bets.date, bets.price, users.name as user_name FROM bets
                 JOIN users ON bets.user_id = users.id
                 JOIN lots ON bets.lot_id = lots.id
                 WHERE lot_id = ' . $lot_id;
    $bets = get_data($sql_bets, $connection);

    $lot_content = render_template('templates/lot.php', [
        'lot' => $lot[0],
        'bets' => $bets,
        'user_registered' => $user_registered
    ]);
}

if (isset($_POST['lot-id'])) {
    $bet = $_POST;
    $lot_id = $bet['lot-id'];
    $sql_lot = 'SELECT lots.id, lots.name, categories.name as category, creation_date, image, description, price, end_date, rate_step FROM lots
                JOIN categories ON lots.category_id = categories.id
                WHERE lots.id = ' . $lot_id;
    $lot = get_data($sql_lot, $connection);
    $required = ['cost'];
    $rules = ['cost' => 'validate_price'];
    $errors = validate_form($bet, $required, $rules);
    $sql_bets = 'SELECT bets.id as bet_id, bets.date, bets.price, users.name as user_name FROM bets
                 JOIN users ON bets.user_id = users.id
                 JOIN lots ON bets.lot_id = lots.id
                 WHERE lot_id = ' . $lot_id;
    $bets = get_data($sql_bets, $connection);

    if (count($errors)) {
        $lot_content = render_template('templates/lot.php', [
            'lot' => $lot,
            'bets' => $bets,
            'errors' => $errors,
        ]);
    } else {
        $sql_bet_insert = 'INSERT INTO bets (date, price, user_id, lot_id) VALUES (NOW(), ?, ?, ?)';
        $stmt = mysqli_prepare($connection, $sql_bet_insert);
        mysqli_stmt_bind_param($stmt, 'iii', $bet['cost'], $user_id, $lot_id);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            header('Location: /lot.php?lot_id=' . $lot_id);
        }
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