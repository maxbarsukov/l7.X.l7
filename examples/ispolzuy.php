<?php
$peremennaya = 'Hello World!';

// Использование оператора use
function() use ($peremennaya) : string
{
    return $peremennaya;
};

// Альтернативный вариант, используя короткий синтаксис
fn(): string => $peremennaya;
