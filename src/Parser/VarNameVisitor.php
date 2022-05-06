<?php

namespace Maxbarsukov\L7xl7\Parser;

use Maxbarsukov\L7xl7\Utils\Transliterator;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class VarNameVisitor extends NodeVisitorAbstract
{
    public function enterNode(Node $node)
    {
        $classNames = [
            'PhpParser\Node\Attribute',
            'PhpParser\Node\Const_',
            'PhpParser\Node\Identifier',
            'PhpParser\Node\Stmt\ClassMethod',
            'PhpParser\Node\Stmt\ClassLike',
            'PhpParser\Node\Stmt\Identifier',
            'PhpParser\Node\Expr\StaticCall',
            'PhpParser\Node\Expr\UseUse',
            'PhpParser\Node\Expr\Variable',
            'PhpParser\Node\Expr\StaticPropertyFetch',
            'PhpParser\Node\Expr\PropertyFetch',
            'PhpParser\Node\Expr\NullsafePropertyFetch',
            'PhpParser\Node\Expr\NullsafeMethodCall',
            'PhpParser\Node\Expr\MethodCall',
            'PhpParser\Node\Expr\ConstFetch',
            'PhpParser\Node\Stmt\Function_',
            'PhpParser\Node\Stmt\Goto_',
            'PhpParser\Node\Stmt\Label',
            'PhpParser\Node\Stmt\PropertyProperty',
        ];

        foreach ($classNames as $className) {
            if (is_a($node, $className)) {
                $node->name = Transliterator::transliterate($node->name);
            }
        }

        if (is_a($node, 'PhpParser\Node\Stmt\TraitUseAdaptation\Alias')) {
            $node->newName = Transliterator::transliterate($node->newName);
        }

        $classNames = [
            'PhpParser\Node\Arg',
            'PhpParser\Node\Expr\FuncCall',
            'PhpParser\Node\Expr\NullsafeMethodCall',
            'PhpParser\Node\Expr\MethodCall',
            'PhpParser\Node\Expr\StaticCall',
            'PhpParser\Node\Stmt\UseUse',
            'PhpParser\Node\Stmt\Namespace_',
            'PhpParser\Node\Expr\ClassConstFetch',
        ];
        foreach ($classNames as $className) {
            if (is_a($node, $className)) {
                if (is_a($node->name, 'PhpParser\Node\Name')) {
                    foreach ($node->name->parts as &$part) {
                        $part = Transliterator::transliterate($part);
                    }
                } elseif (is_a($node->name, 'PhpParser\Node\Identifier')) {
                    $node->name->name = Transliterator::transliterate($node->name->name);
                }
            }
        }

        if (is_a($node, 'PhpParser\Node\Name')) {
            foreach ($node->parts as &$part) {
                $part = Transliterator::transliterate($part);
            }
        }
    }
}
