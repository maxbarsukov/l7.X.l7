<?php

namespace Maxbarsukov\L7xl7\Parser;

use Maxbarsukov\L7xl7\Net\DollarCourse;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NumberNodesVisitor extends NodeVisitorAbstract
{
    public function enterNode(Node $node)
    {
        $course = DollarCourse::load();
        if (is_a($node, 'PhpParser\Node\Scalar\DNumber')) {
            $node->value = $node->value * $course;
        }

        if (is_a($node, 'PhpParser\Node\Scalar\LNumber')) {
            $node->value = (int) round($node->value * round($course, 0));
        }
    }
}
