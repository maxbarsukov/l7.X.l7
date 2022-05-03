<?php

namespace Maxbarsukov\L7xl7\Utils;

class Error
{
    public static function raise($message, $status = 1)
    {
        echo $message."\n";
        exit($status);
    }
}
