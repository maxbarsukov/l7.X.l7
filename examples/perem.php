<?php

$a = 'I am a'; // Запись значения в переменную $a
echo $a; // Вывод переменной $а

$b = 'a';
echo $$b; // Вывод переменной $а (дополнительный $ перед переменной $b)

echo ${'a'}; // Вывод переменной $a

imya_funktsii(); // Вызов функции имя_функции
$c = 'имя_функции';
$c(); //Вызов функции имя_функции

$d = 'ИмяКласса';
$obj = new ImyaRlassa; // Создание объекта класса ИмяКласса
$obj = new $d(); // Создание объекта класса ИмяКласса
$obj->b; // Обращение к свойству b объекта
$obj->c(); // Вызов метода c() объекта

$obj->$b; // Обращение к свойству a объекта, так как $b = 'a'
$obj->$c(); // Вызов метода function_name() объекта, так как $c = 'имя_функции'
