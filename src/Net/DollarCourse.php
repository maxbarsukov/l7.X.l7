<?php

namespace Maxbarsukov\L7xl7\Net;

class DollarCourse
{
    private static ?float $_cache = null;

    final public static function load(): float
    {
        if (!$data = self::$_cache) {
            $url = 'https://www.cbr-xml-daily.ru/daily_json.js';

            $ch = curl_init();
            curl_setopt($ch, \CURLOPT_URL, $url);
            curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
            $data = json_decode(curl_exec($ch), $assoc = true)['Valute']['USD']['Value'];
            curl_close($ch);

            self::$_cache = $data;
        }

        return $data;
    }
}
