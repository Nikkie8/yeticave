<?php
require_once('init.php');

if (!check_auth()) {
    http_response_code(403);
    exit();
}

if (isset($_SESSION['user'])) {
    $user_id = intval($_SESSION['user']['id']);

    $sql_bets = 'SELECT bets.id as id, bets.date as date, bets.price as price, lot_id, 
                        lots.name as lot_name, lots.image as lot_image, lots.end_date as lot_end_date,
                        categories.name as lot_category
                 FROM bets 
                 JOIN lots ON bets.lot_id = lots.id
                 JOIN categories ON lots.category_id = categories.id
                 WHERE user_id = ' . $user_id;
    $bets = get_data($sql_bets, $connection);

    $mylots_content = render_template('templates/mylots.php', [
        'bets' => $bets
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