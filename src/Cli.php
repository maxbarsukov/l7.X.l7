<?php

namespace Maxbarsukov\L7xl7;

use Maxbarsukov\L7xl7\FileDispatcher\FileDispatcher;
use Maxbarsukov\L7xl7\FileLoader\FileLoader;
use Maxbarsukov\L7xl7\Utils\Error;
use Maxbarsukov\L7xl7\Utils\PathTransformer;

class Cli
{
    private ?string $_filename;
    private string $_outDir;
    private array $_fileExt;

    public function __construct(array $argv)
    {
        $this->_parseConfig($argv);
    }

    public function run(): void
    {
        if ('-h' === $this->_filename || '--help' === $this->_filename) {
            $this->_help();
        }

        $baseFilename = $this->_filename;
        $filename = $_SERVER['PWD'].'/'.$baseFilename;

        foreach ([$baseFilename, $filename] as $f) {
            if (is_file($f) || is_dir($f)) {
                $filenames = (new FileLoader($this->_fileExt))->load($f);
                $pathTransformer = new PathTransformer($this->_outDir);
                $dispatcher = new FileDispatcher($filenames, $pathTransformer);
                $dispatcher->transpileAndSave();

                return;
            }
        }

        Error::raise('Нет такого файла или папки: '.$filename);
    }

    private function _help(): void
    {
        echo <<<HELP
        Description:
          Display help for a command

        Usage:
          l7xl7 [<input_dir_or_file>] [options]

        Arguments:
          input_dir_or_file       Input file or directory

        Options:
              --inpext=EXTS       The input files extensions
                                      (format as ".ext,..." or "ext,...")
                                      [default: "ruphp,rup"]
              --outdir=OUTDIR     The directory for compiled files
                                      [default: "out"]

        Help:
          This help message:

            l7xl7 help

        HELP;
        exit;
    }

    private function _parseConfig(array $args): void
    {
        if (empty($args)) {
            return;
        }
        $this->_filename = $args[0];
        foreach (\array_slice($args, 1) as $arg) {
            if (str_starts_with($arg, '--inpext=')) {
                $s = $this->_removePrefix($arg, '--inpext=');
                $this->_fileExt = explode(',', $s);
            }
            if (str_starts_with($arg, '--outdir=')) {
                $this->_outDir = $this->_removePrefix($arg, '--outdir=');
            }
        }
        if (!isset($this->_fileExt)) {
            $this->_fileExt = ['ruphp', 'rphp'];
        }
        if (!isset($this->_outDir)) {
            $this->_outDir = '/out';
        }
    }

    private function _removePrefix(string $text, string $prefix): string
    {
        return substr($text, \strlen($prefix)).'';
    }
}
