<?php

namespace Maxbarsukov\L7xl7;

use Maxbarsukov\L7xl7\FileDispatcher\FileDispatcher;
use Maxbarsukov\L7xl7\FileLoader\FileLoader;
use Maxbarsukov\L7xl7\Utils\Error;
use Maxbarsukov\L7xl7\Utils\PathTransformer;

class Cli
{
    private array $_config;

    public function __construct(array $argv)
    {
        $this->_config = $argv;
    }

    public function run(): void
    {
        $baseFilename = $this->_config[0];
        $filename = $_SERVER['PWD'].'/'.$baseFilename;

        foreach ([$baseFilename, $filename] as $f) {
            if (is_file($f) || is_dir($f)) {
                $filenames = (new FileLoader(['.ruphp']))->load($f);
                $pathTransformer = new PathTransformer('/out');
                $dispatcher = new FileDispatcher($filenames, $pathTransformer);
                $dispatcher->transpileAndSave();

                return;
            }
        }

        Error::raise('No such file or directory: '.$filename);
    }
}
