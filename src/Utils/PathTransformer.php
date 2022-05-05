<?php

namespace Maxbarsukov\L7xl7\Utils;

class PathTransformer
{
    private string $_outBaseDir;

    public function __construct(string $outBaseDir)
    {
        $this->_outBaseDir = $outBaseDir;
    }

    public function transform(string $filename): string
    {
        $info = pathinfo($filename);
        $filename = $info['dirname'].'/'.Transliterator::transliterate($info['basename']);

        $parts = explode('.', $filename);
        $parts[\count($parts) - 1] = 'php';

        return implode('.', $parts);
    }
}
