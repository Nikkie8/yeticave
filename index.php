<?php
require_once('init.php');

$sql_categories = 'SELECT `name`, `modifier` FROM categories';
$categories = get_data($sql_categories, $connection);
$sql_lots = 'SELECT lots.id, lots.name, categories.name as category, creation_date, image, description, price, end_date, rate_step FROM lots JOIN categories ON lots.category_id = categories.id WHERE end_date > NOW() ORDER BY creation_date DESC';
$lots = get_data($sql_lots, $connection);

$index_content = render_template('templates/index.php', [
    'categories' => $categories,
    'lots' => $lots
]);

$index_layout = render_template('templates/layout.php', [
    'is_index' => true,
    'main_class' => 'container',
    'content' => $index_content,
    'categories' => $categories,
    'page_title' => 'YetiCave'
]);

print($index_layout);