<?php

namespace Maxbarsukov\L7xl7\Transpiler;

use Maxbarsukov\L7xl7\Dictionary\Dictionary;
use Maxbarsukov\L7xl7\Parser\Parser;
use Maxbarsukov\L7xl7\Utils\Error;
use Maxbarsukov\L7xl7\Utils\Utils;

class Transpiler
{
    private string $_text;
    private string $_filename;

    // Hashtag comments
    private array $_commentsH = [];
    // One line comments
    private array $_commentsO = [];
    // Multiline comments
    private array $_commentsM = [];

    private array $_stringsDC = [];
    private array $_stringsUC = [];

    public function __construct(string $filename)
    {
        $this->_filename = $filename;
        $this->_text = file_get_contents($filename);
    }

    public function transpile(): string
    {
        $this->_removeStrings();
        $this->_removeComments();

        $this->_checkForDollarSigns();
        $this->_updateKeywords();
        $this->_updateAst();

        $this->_putStringsBack();
        $this->_putCommentsBack();

        return $this->_text;
    }

    private function _removeStrings()
    {
        $count = 0;
        $this->_text = preg_replace_callback(
            "/\".*?(?<!\\\)\"/",
            function ($matches) use (&$count) {
                $val = '"LXL_STRING_D_'.(string) $count.'"';
                $this->_stringsDC[$count] = $matches[0];
                ++$count;

                return $val;
            },
            $this->_text
        );

        $count = 0;
        $this->_text = preg_replace_callback(
            "/'.*?(?<!\\\)'/",
            function ($matches) use (&$count) {
                $val = '"LXL_STRING_U_'.(string) $count.'"';
                $this->_stringsUC[$count] = $matches[0];
                ++$count;

                return $val;
            },
            $this->_text
        );
    }

    private function _putStringsBack()
    {
        foreach (['D', 'U'] as $char) {
            $this->_text = preg_replace_callback(
                '/"LXL_STRING_'.$char.'_(.*?)"/',
                function ($matches) use ($char) {
                    $tmp = Utils::removePrefix($matches[0], '"LXL_STRING_'.$char.'_');
                    $tmp = substr_replace($tmp, '', -1);
                    $val = (int) $tmp;

                    return $this->{'_strings'.$char.'C'}[$val];
                },
                $this->_text
            );
        }
    }

    private function _removeComments()
    {
        $commentTypes = [
            'H' => "~#[^\r\n]*~",
            'O' => "~//[^\r\n]*~",
            'M' => "~/\*.*?\*/~s",
        ];
        foreach ($commentTypes as $key => $regex) {
            $count = 0;
            $this->_text = preg_replace_callback(
                $regex,
                function ($matches) use (&$count, $key) {
                    $val = '"LXL_COMMENT_'.$key.'_'.(string) $count.'";';
                    $this->{'_comments'.$key}[$count] = $matches[0];
                    ++$count;

                    return $val;
                },
                $this->_text
            );
        }
    }

    private function _putCommentsBack()
    {
        foreach (['H', 'O', 'M'] as $char) {
            $this->_text = preg_replace_callback(
                '/"LXL_COMMENT_'.$char.'_(.*?)";/',
                function ($matches) use ($char) {
                    $tmp = Utils::removePrefix($matches[0], '"LXL_COMMENT_'.$char.'_');
                    $tmp = substr_replace($tmp, '', -2);

                    return $this->{'_comments'.$char}[(int) $tmp];
                },
                $this->_text
            );
        }
    }

    private function _updateAst(): void
    {
        $this->_text = Parser::updateAst($this->_text);
    }

    private function _updateKeywords(): void
    {
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
