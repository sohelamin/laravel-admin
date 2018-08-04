<?php

namespace Appzcoder\LaravelAdmin;

use App\Setting as SettingModel;

class Setting
{
    /**
     * Set value against a key.
     *
     * @param string $key
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function set($key, $value)
    {
        $setting = SettingModel::create(
            [
                'key' => $key,
                'value' => $value,
            ]
        );

        return $setting ? $value : false;
    }

    /**
     * Get value by a key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        $setting = SettingModel::where('key', $key)->first();

        return $setting ? $setting->value : false;
    }
}
