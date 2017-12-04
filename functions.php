<?php
/** Подключает шаблон
 * @param string $template_url ссылка на шаблон
 * @param array $data массив с данными
 * @return string разметка
 */
function render_template($template_url = '', $data = []) {
    $result = '';

    if (file_exists($template_url)) {
        ob_start();
        extract($data);
        require_once($template_url);
        $result = ob_get_clean();
    }

    return $result;
}

/**
 * @param $time
 * @return false|string
 */
function format_time($time) {
    $now = strtotime('now');
    $time_passed = $now - $time;
    $hours = $time_passed / 3600;

    if ($hours < 1) {
        $format = 'i минут назад';
        $time_stamp = $time_passed;
    } elseif ($hours >= 1 and $hours < 24) {
        $format = 'H часов назад';
        $time_stamp = $time_passed;
    } else {
        $format = 'd.m.y в H:i';
        $time_stamp = $time;
    }

    $formatted_time = date($format, $time_stamp);

    return $formatted_time;
}

/**
 * @param $time
 * @return string
 */
function get_timer($time) {
    $now_ts = strtotime('now');
    $time_ts = strtotime($time);
    $hours_left = ($time_ts - $now_ts) / 3600;
    $now = date_create('now');
    $date = date_create($time);
    $interval = date_diff($now, $date);
    $time_left = $interval->format('%H:%I');

    if ($now_ts >= $time_ts) {
        $time_left = '00:00';
    } elseif ($hours_left > 24) {
        $time_left = $interval->format('%d д');
    }

    return $time_left;
}

function validate_price($val) {
    $number = floatval($val);
    $is_number = is_numeric($number);
    $is_positive = $number >= 0;

    return ($is_number && $is_positive);
}

/**
 * @param $email
 * @param $users
 * @return null or user
 */
function search_user($email, $users) {
    $result = null;

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }

    return $result;
}