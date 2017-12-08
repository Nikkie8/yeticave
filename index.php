<?php
require_once('init.php');

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