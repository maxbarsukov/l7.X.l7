<?php

namespace Maxbarsukov\L7xl7\Parser;

use Maxbarsukov\L7xl7\Utils\Error;
use PhpParser\Error as ParserError;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;

class Parser
{
    final public static function updateAst(string $code): string
    {
        $ast = self::_getAst($code);

        $traverser = new NodeTraverser();
        $traverser->addVisitor(new VarNameVisitor());
        $traverser->addVisitor(new NumberNodesVisitor());

        $newAst = $traverser->traverse($ast);

        $prettyPrinter = new PrettyPrinter\Standard();

        return $prettyPrinter->prettyPrintFile($newAst);
    }

    private static function _getAst(string $code): ?array
    {
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        try {
            $ast = $parser->parse($code);
        } catch (ParserError $error) {
            Error::raise("Parse error: {$error->getMessage()}\n");
        }

        return $ast;
    }
}
