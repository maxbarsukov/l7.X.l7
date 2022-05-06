<?php

namespace Maxbarsukov\L7xl7\Utils;

class Utils
{
    public static function removePrefix(string $text, string $prefix): string
    {
        return substr($text, \strlen($prefix)).'';
    }
}
