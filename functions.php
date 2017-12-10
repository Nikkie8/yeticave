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

/** Форматирует вывод времени в зависимости от того, сколько уже прошло
 * @param $time
 * @return false|string
 */
function format_time($time) {
    $time = strtotime($time);
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

/** Форматирует вывод даты и времени
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

/** Валидирует стоимость
 * @param $val
 * @return bool
 */
function validate_price($val) {
    $number = floatval($val);
    $is_number = is_numeric($number);
    $is_positive = $number >= 0;

    return ($is_number && $is_positive);
}

/** Валидирует изображение
 * @param $field_name
 * @return bool|null|string
 */
function validate_image($field_name) {
    $result = null;

    if (empty($_FILES[$field_name]['name'])) {
        $result = false;
    } else {
        $tmp_name = $_FILES[$field_name]['tmp_name'];
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($file_info, $tmp_name);

        if ($file_type !== 'image/jpeg' && $file_type !== 'image/png') {
            $result = false;
        } else {
            $path = 'img/' . $_FILES[$field_name]['name'];
            move_uploaded_file($tmp_name, $path);
            $result = $path;
        }
    }

    return $result;
}

/** Проверяет, авторизован ли пользователь
 * @return array
 */
function check_auth() {
    $user_registered = [];

    if (isset($_SESSION['user'])) {
        $user_registered = $_SESSION['user'];
    }

    return $user_registered;
}

/** Запрашивает данные из БД
 * @param $sql
 * @param $connection
 * @return array|null
 */
function get_data($sql, $connection) {
    $result = mysqli_query($connection, $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

/** Валидирует отправленную форму
 * @param $data данные формы
 * @param $required обязательные поля
 * @param null $rules правила валидации
 * @return array
 */
function validate_form($data, $required, $rules = null) {
    $errors = [];
    $errorsDictionary = [
        'email' => 'Введите e-mail',
        'password' => 'Введите пароль',
        'lot-name' => 'Введите наименование лота',
        'category' => 'Выберите категорию',
        'message' => 'Напишите описание лота',
        'contacts' => 'Напишите как с вами связаться',
        'name' => 'Введите имя',
        'image' => 'Загрузите файл в формате jpg/png',
        'lot-rate' => 'Введите начальную цену',
        'lot-step' => 'Введите шаг ставки',
        'lot-date' => 'Введите дату завершения торгов'
    ];

    foreach ($data as $key => $value) {
        if (in_array($key, $required) && $value == '' || $value == 'Выберите категорию') {
            $errors[$key] = $errorsDictionary[$key];
        }

        if ($rules && key_exists($key, $rules)) {
            $result = call_user_func($rules[$key], $value);

            if (!$result) {
                $errors[$key] = $errorsDictionary[$key];
            }
        }
    }

    return $errors;
}