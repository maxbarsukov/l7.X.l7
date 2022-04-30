<?php namespace Maxbarsukov\L7xl7;

use \Maxbarsukov\L7xl7\Dictionary;

class Cli
{
    private array $_config;

    public function __construct(array $args)
    {
        $this->_config = $args;
    }

    public function run()
    {
        echo Dictionary::keywords()["функция"]."\n";
        echo Dictionary::signs()["₽"]."\n";
    }
}
