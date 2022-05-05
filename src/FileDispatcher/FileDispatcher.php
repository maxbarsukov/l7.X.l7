<?php

namespace Maxbarsukov\L7xl7\FileDispatcher;

use Maxbarsukov\L7xl7\Transpiler\Transpiler;
use Maxbarsukov\L7xl7\Utils\PathTransformer;

class FileDispatcher
{
    private array $_filenames;
    private PathTransformer $_pathTransformer;

    public function __construct(array $filenames, PathTransformer $pathTransformer)
    {
        $this->_filenames = $filenames;
        $this->_pathTransformer = $pathTransformer;
    }

    public function transpileAndSave(): void
    {
        foreach ($this->_filenames as $filename) {
            $code = (new Transpiler($filename))->transpile();
            $newFilename = $this->_pathTransformer->transform($filename);
            file_put_contents($newFilename, $code);
        }
    }
}
