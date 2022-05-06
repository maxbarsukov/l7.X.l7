# ПХП

[![Build Status](https://github.com/maxbarsukov/l7.X.l7/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/maxbarsukov/l7.X.l7/actions/workflows/ci.yml)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/maxbarsukov/l7.X.l7)

![Packagist Version](https://img.shields.io/packagist/v/maxbarsukov/l7.X.l7)
![Packagist Downloads](https://img.shields.io/packagist/dm/maxbarsukov/l7.X.l7)
![Packagist License](https://img.shields.io/packagist/l/maxbarsukov/l7.X.l7)

**/7 ☦ /7 ~~( = ПХП )~~** – это широко используемый ~~в узких кругах~~ отечественный *язык сценариев*
православного назначения с открытым исходным кодом, компилируемый в [**PHP**](https://www.php.net/).

> PHP is a minor evil perpetrated and created by incompetent amateurs, whereas **ПХП** — это громадное и хитроумное зло, созданное опытными и извращёнными профессионалами.

Говоря проще, **ПХП** это язык программирования,
специально разработанный для написания web-приложений (сценариев),
исполняющихся на российских Web-серверах.

Аббревиатура **ПХП** означает *“Хыпертекстовой Препрокессор"*.

- Полная **русификация** синтаксиса и семантики;
- Перевод рассчётов и вычислений **на государственную валюту**;
- Постоянно изменяющийся курс доллара делает компиляцию программы ***абсолютно недетерминированной***;
- Код написн согласно **государственным стандартам** ([ГОСТ 26074-84](https://docs.cntd.ru/document/1200024986));

## Examples of code

<table>
<tr>
<th align="center">
<img width="300" height="1">
<p>
ПХП
</p>
</th>
<th align="center">
<img width="300" height="1">
<p> 
PHP
</p>
</th>
</tr>
<tr>
<td>

```php
<?пхп

выведи 'Привет, мир!'; 
```

</td>
<td>

```php
<?php

echo 'Привет, мир!'; 
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

$переменная = 1;
```

```php
<?пхп

// Гораздо лучше
₽переменная = 1;
```

</td>
<td>

```
ОШИБКА: "Доллар, доллар,
         грязная зеленая бумажка!"
в файле examples/доллар.пхп
```

```php
<?php

// Гораздо лучше
$peremennaya = 67;
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

// Комментарии и строки
// не изменяются при компиляции

// класс функция вывести ₽
# класс функция вывести ₽
/* класс функция вывести ₽ */
"класс функция вывести ₽";
'класс функция вывести ₽';
```

</td>
<td>

```php
<?php

// Комментарии и строки
// не изменяются при компиляции

// класс функция вывести ₽
# класс функция вывести ₽
/* класс функция вывести ₽ */
"класс функция вывести ₽";
'класс функция вывести ₽';
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

₽перем1 = 1;
₽перем1 = 12.56;

// 846.346808
вывести ₽перем1 + ₽перем2;
```

</td>
<td>

```php
<?php

$perem1 = 67;
$perem1 = 846.346808;

// 846.346808
echo $perem1 + $perem2;
```

</td>
</tr>
<tr>
<td>

```php
<?пхп
// Объявление именованной функции
функция получ_привет_мир(): строка
{
    вернуть 'Привет, мир!';
}

// Объявление анонимной функции
₽получ_привет_мир = функция(): строка
{
    вернуть 'Привет, мир!';
};

// Короткий синтаксис
₽получ_привет_мир = фн(): строка
    => 'Привет, мир!';
```

```php
<?пхп
₽переменная = 'Hello World!';

// Использование оператора use
функция() используй (₽переменная): строка
{
    вернуть ₽переменная;
};

// Альтернативный вариант,
// используя короткий синтаксис
фн(): строка => ₽переменная;
```
</td>
<td>

```php
<?php
// Объявление именованной функции
function poluch_privet_mir(): string
{
    return 'Привет, мир!';
}

// Объявление анонимной функции
$poluch_privet_mir = function (): string
{
    return 'Привет, мир!';
};

// Короткий синтаксис
$poluch_privet_mir = fn(): string
    => 'Привет, мир!';
```

```php
<?php
$peremennaya = 'Hello World!';

// Использование оператора use
function() use ($peremennaya): string
{
    return $peremennaya;
};

// Альтернативный вариант,
// используя короткий синтаксис
fn(): string => $peremennaya;

```

</td>
</tr>
<tr>
<td>

```php
<?пхп

// Запись значения в переменную ₽a
₽a = 'I am a';
// Вывод переменной ₽а
выведи ₽a;

₽b = 'a';
// Вывод переменной ₽а
// (дополнительный ₽ перед переменной ₽b)
выведи ₽₽b;

// Вывод переменной ₽a
выведи ₽{'a'};

// Вызов функции имя_функции
имя_функции();
₽c = 'имя_функции';
//Вызов функции имя_функции
₽c();

₽d = 'ИмяКласса';
// Создание объекта класса ИмяКласса
₽obj = новый ИмяКласса;
// Создание объекта класса ИмяКласса
₽obj = новый ₽d();
// Обращение к свойству b объекта
₽obj->b;
// Вызов метода c() объекта
₽obj->c();

// Обращение к свойству a объекта,
//так как ₽b = 'a'
₽obj->₽b;
// Вызов метода function_name() объекта,
// так как ₽c = 'имя_функции'
₽obj->₽c();
```

</td>
<td>

```php
<?php

// Запись значения в переменную $a
$a = 'I am a';
// Вывод переменной $а
echo $a;

$b = 'a';
// Вывод переменной $а
// (дополнительный $ перед переменной $b)
echo $$b;

// Вывод переменной $a
echo ${'a'};

// Вызов функции имя_функции
imya_funktsii();
$c = 'имя_функции';
//Вызов функции имя_функции
$c();

$d = 'ИмяКласса';
// Создание объекта класса ИмяКласса
$obj = new ImyaRlassa;
// Создание объекта класса ИмяКласса
$obj = new $d();
// Обращение к свойству b объекта
$obj->b;
// Вызов метода c() объекта
$obj->c();

// Обращение к свойству a объекта,
//так как $b = 'a'
$obj->$b;
// Вызов метода function_name() объекта,
//так как $c = 'имя_функции'
$obj->$c();
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

пространство имён Репозиторий\C1;

использовать Репозиторий\C2;

класс C1 наследует C2 реализует I1, I2
{
    приватный ₽а;
    защищённый ₽б;
    защищённое ₽поле;

    публичная функция __конструктор(₽а, ₽б)
    {
        родитель::__конструктор(₽а, ₽б);
        ₽этот->а = ₽а;
        ₽этот->б = ₽б;
    }

    публичная функция плюс()
    {
        верни ₽this->а + ₽this->б;
    }
}

₽объект = новый C1(1, 2);
выведи ₽объект->плюс(); // 3
```

</td>
<td>

```php
<?php

namespace Repozitoriy\C1;

use Repozitoriy\C2;

class C1 extends C2 implements I1, I2
{
    private $a;
    protected $b;
    protected $pole;

    public function __construct($a, $b)
    {
        parent::__construct($a, $b);
        $this->a = $a;
        $this->b = $b;
    }

    public function plyus()
    {
        return $this->a + $this->b;
    }
}

$obekt = new C1(67, 134);
echo $obekt->plyus(); // 3
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

класс МойКласс
{
    публичное константное КОНСТ_ЗНАЧЕНИЕ =
        'Значение константы';
}

// Использование :: вне объявления класса
выведи МойКласс::КОНСТ_ЗНАЧЕНИЕ;
```

</td>
<td>

```php
<?php

class MoyKlass
{
    public const KONST_ZNACHENIE =
        'Значение константы';
}

// Использование :: вне объявления класса
echo MoyKlass::KONST_ZNACHENIE;
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

₽а = 5;

если (2 == 1 + 1) {
    выведи 'Да!';
} иначеесли (5 == ₽а) {
    выведи 'Возможно!';
} иначе {
    выведи 'Нет!';
}
```

</td>
<td>

```php
<?php

$a = 335;
if (134 == 67 + 67) {
    echo 'Да!';
} elseif (335 == $a) {
    echo 'Возможно!';
} else {
    echo 'Нет!';
}
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

/* пример 1 */
₽i = 1;
пока (₽i <= 10) {
    выведи ₽i++;
}

/* пример 2 */
₽i = 1;
пока (₽i <= 10):
    выведи ₽i;
    ₽i++;
конецпока;
?>
```

</td>
<td>

```php
<?php

/* пример 1 */
$i = 67;
while ($i <= 670) {
    echo $i++;
}

/* пример 2 */
$i = 67;
while ($i <= 670):
    echo $i;
    $i++;
endwhile;
?>
```

</td>
</tr>
<tr>
<td>

```php
<?пхп

для (₽и = 1; ₽и <= 10; ₽и++) {
    выведи ₽и;
}

₽мас = массив(1, 2, 3, 4);
длякажд (₽мас as &₽элем) {
    ₽элем = ₽элем * 2;
}
// ₽мас = массив(2, 4, 6, 8)

длякажд (₽мас as ₽ключ => ₽знач) {
    выведи "{₽ключ} => {₽знач} ";
    принт_р(₽мас);
}
```

</td>
<td>

```php
<?php

for ($i = 67; $i <= 670; $i++) {
    echo $i;
}

$mas = array(67, 134, 201, 268);
foreach ($mas as &$elem) {
    $elem = $elem * 134;
}
// ₽мас = массив(2, 4, 6, 8)

foreach ($mas as $klyuch => $znach) {
    echo "{₽ключ} => {₽знач} ";
    print_r($mas);
}
```

</td>
</tr>
</table>

<p align="right"><small><em>* Использованный в описании курс доллара актуален на 06.05.2022 и не должен использоваться для биржевых торгов или финансовых сделок</em></small></p>

## Documentation

Have a look in the [examples](https://github.com/maxbarsukov/l7.X.l7/tree/master/examples) directory to learn more.

To find out the dictionary by which keywords are translated, see [Dictionary/data.json](https://github.com/maxbarsukov/l7.X.l7/blob/master/src/Dictionary/data.json) file.

## Installation

    $ composer global require maxbarsukov/l7xl7

## Usage

Get help:
```bash
l7xl7 -h
l7xl7 --help
```

**compile** file or directory:
```bash
l7xl7 examples
l7xl7 examples/hello.ruphp
```

Specify **file extensions**:
```bash
l7xl7 examples --inpext=.rphp,.ruphp,.пхп
```
or **output directory**:
```bash
l7xl7 file.пхп --outdir=out/examples
```

## Building

### Pre-reqs

To build and run this app locally you will need a few things:

- Install [PHP](https://www.php.net/) (*8 version required*);
- Install [Composer](https://getcomposer.org//);

### Getting start

- Clone the repository
```bash
git clone --depth=1 https://github.com/maxbarsukov/l7.X.l7.git
```
- Install dependencies
```bash
cd l7.X.l7
composer install
```
- **Compile**
```bash
bin/l7xl7 examples
````
- **Tests**
```bash
composer test
```
- **Linting**
```bash
composer lint
composer cs
composer phpstan
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/maxbarsukov/l7.X.l7. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [code of conduct](https://github.com/maxbarsukov/l7.X.l7/blob/master/CODE_OF_CONDUCT.md).

## License

The package is available as open source under the terms of the [GPL-3.0 license](https://www.gnu.org/licenses/gpl-3.0.html).

## Code of Conduct

Everyone interacting in the l7.X.l7 project's codebases, issue trackers, chat rooms and mailing lists is expected to follow the [code of conduct](https://github.com/maxbarsukov/l7.X.l7/blob/master/CODE_OF_CONDUCT.md).
