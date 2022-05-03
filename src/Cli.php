<?php

namespace Maxbarsukov\L7xl7;

use Maxbarsukov\L7xl7\FileDispatcher\FileDispatcher;

class Cli
{
    private array $_config;

    public function __construct(array $argv)
    {
        $this->_config = $argv;
    }

    public function run()
    {
        $baseFilename = $this->_config[0];
        $filename = $_SERVER['PWD'].'/'.$baseFilename;

        if (is_file($baseFilename) || is_dir($baseFilename)) {
            var_dump(
                (new FileDispatcher())
                    ->dispatch($baseFilename)
            );

            return;
        }
        if (is_file($filename) || is_dir($filename)) {
            var_dump(
                (new FileDispatcher())
                    ->dispatch($filename)
            );

            return;
        }
        Error::raise('No such file or directory: '.$filename);
    }
}
