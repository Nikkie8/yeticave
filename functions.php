<?php
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