<?php

use App\Models\BusinessSetting;




if (!function_exists('getBusinessSetting')) {
    function getBusinessSetting($key, $default = null)
    {
        $setting = BusinessSetting::where('key', $key)->first();

        if (!$setting) {
            return $default;
        }


        $decoded = json_decode($setting->value, true);

        return is_array($decoded) ? $decoded : $setting->value;
    }
}
if (!function_exists('updateBusinessSetting')) {
    function updateBusinessSetting($type, $value)
    {
        try {

            BusinessSetting::updateOrCreate(
                ['key' => $type],
                ['value' => $value]
            );

            return true;
        } catch (\Exception $e) {
            Log::info('error ' . $e->getMessage());
            return false;
        }
    }
}

