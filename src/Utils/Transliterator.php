<?php

namespace Maxbarsukov\L7xl7\Utils;

class Transliterator
{
    public static function transliterate(string $text): string
    {
        $translit = self::transliterateString($text);
        if ($text === mb_strtoupper($text, "utf-8")) {
            return mb_strtoupper($translit, "utf-8");
        }
        if ($text === mb_strtolower($text, "utf-8")) {
            return mb_strtolower($translit, "utf-8");
        }

        return $translit;
    }

    public static function transliterateString(string $text): string
    {
        $converter = [
            'а' => 'a',  'б' => 'b',   'в' => 'v',   'г' => 'g',  'д' => 'd',
            'е' => 'e',  'ё' => 'e',   'ж' => 'zh',  'з' => 'z',  'и' => 'i',
            'й' => 'y',  'к' => 'k',   'л' => 'l',   'м' => 'm',  'н' => 'n',
            'о' => 'o',  'п' => 'p',   'р' => 'r',   'с' => 's',  'т' => 't',
            'у' => 'u',  'ф' => 'f',   'х' => 'h',   'ц' => 'c',  'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '',    'ы' => 'y',  'ъ' => '',
            'э' => 'e',  'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',  'Б' => 'B',   'В' => 'V',   'Г' => 'G',  'Д' => 'D',
            'Е' => 'E',  'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',  'И' => 'I',
            'Й' => 'Y',  'К' => 'K',   'Л' => 'L',   'М' => 'M',  'Н' => 'N',
            'О' => 'O',  'П' => 'P',   'Р' => 'R',   'С' => 'S',  'Т' => 'T',
            'У' => 'U',  'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',  'Ч' => 'Ch',
            'Ш' => 'Sh', 'Щ' => 'Sch', 'Ь' => '',    'Ы' => 'Y',  'Ъ' => '',
            'Э' => 'E',  'Ю' => 'Yu',  'Я' => 'Ya',
        ];

        return strtr($text, $converter);
    }
}
