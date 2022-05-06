<?php

// Объявление именованной функции
function poluch_privet_mir() : string
{
    return 'Привет, мир!';
}
// Объявление анонимной функции
$poluch_privet_mir = function () : string {
    return 'Привет, мир!';
};
// Короткий синтаксис
$poluch_privet_mir = fn(): string => 'Привет, мир!';
