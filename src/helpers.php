<?php

if (!function_exists('setting')) {
    function setting($key = false, $defaultValue = false) {
        $setting = app('Setting');

        if ($key === false) {
            return $setting;
        }

        $value = $setting->get($key);

        return $value ? $value : $defaultValue;
    }
}
