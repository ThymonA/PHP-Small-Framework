<?php

namespace Framework;

class Helper
{
    public function redirect($url, $permanent = false)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }

        exit();
    }

    public function retype($mixed, $type = NULL) {
        $type === NULL || settype($mixed, $type);

        return $mixed;
    }
}
