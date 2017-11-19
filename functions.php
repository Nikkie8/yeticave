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