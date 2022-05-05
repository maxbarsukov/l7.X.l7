<?php

namespace Maxbarsukov\L7xl7\Dictionary;

class Dictionary
{
    private static ?array $_cache = null;

    final public static function load(): ?array
    {
        if (!$data = self::$_cache) {
            $json = file_get_contents(__DIR__.'/data.json');
            $data = json_decode($json, true);
            self::$_cache = $data;
        }

        return $data;
    }
}
