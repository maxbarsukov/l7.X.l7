<?php

namespace Maxbarsukov\L7xl7\Transpiler;

use Maxbarsukov\L7xl7\Dictionary\Dictionary;
use Maxbarsukov\L7xl7\Parser\Parser;
use Maxbarsukov\L7xl7\Utils\Error;

class Transpiler
{
    private string $_text;
    private string $_filename;

    public function __construct(string $filename)
    {
        $this->_filename = $filename;
        $this->_text = file_get_contents($filename);
    }

    public function transpile(): string
    {
        $this->_checkForDollarSigns();
        $this->_updateKeywords();
        $this->_updateAst();

        return $this->_text;
    }

    private function _updateAst(): void
    {
        $this->_text = Parser::updateAst($this->_text);
    }

    private function _updateKeywords(): void
    {
        // TODO: Ignore comments and strings
        $dictionary = Dictionary::load();

        $from = array_keys($dictionary);
        $to = array_values($dictionary);

        $this->_text = str_replace($from, $to, $this->_text);
    }

    private function _checkForDollarSigns(): void
    {
        if (str_contains($this->_text, '$')) {
            Error::raise(
                '"Доллар, доллар, грязная зеленая бумажка!" в файле '.$this->_filename
            );
        }
    }
}
