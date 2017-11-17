<?php
require_once('functions.php');

$categories = [
    [
        "modifier" => "boards",
        "category" => "Доски и лыжи"
    ],
    [
        "modifier" => "attachment",
        "category" => "Крепления"
    ],
    [
        "modifier" => "boots",
        "category" => "Ботинки"
    ],
    [
        "modifier" => "clothing",
        "category" => "Одежда"
    ],
    [
        "modifier" => "tools",
        "category" => "Инструменты"
    ],
    [
        "modifier" => "other",
        "category" => "Разное"
    ]
];

$items = [
    [
        "title" => "2014 Rossignol District Snowboard",
        "category" => "Доски и лыжи",
        "price" => 10999,
        "image" => "img/lot-1.jpg"
    ],
    [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "image" => "img/lot-2.jpg"
    ],
    [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "image" => "img/lot-3.jpg"
    ],
    [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => 10999,
        "image" => "img/lot-4.jpg"
    ],
    [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "image" => "img/lot-5.jpg"
    ],
    [
        "title" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "image" => "img/lot-6.jpg"
    ]
];

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = strtotime('now');

$time_till_midnight = $tomorrow - $now;

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
$lot_time_remaining = gmdate("H:i", $time_till_midnight);

$page_content = render_template('templates/index.php', [
    'categories' => $categories,
    'items' => $items,
    'lot_time_remaining' => $lot_time_remaining
]);

$layout = render_template('templates/layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'page_title' => 'YetiCave'
]);

print($layout);