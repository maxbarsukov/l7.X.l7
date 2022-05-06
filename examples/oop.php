<?php

namespace Repozitoriy\C1;

use Repozitoriy\C2;
class C1 extends C2 implements I1, I2
{
    private $a;
    protected $b;
    protected $pole;
    public function __construct($a, $b)
    {
        parent::__construct($a, $b);
        $this->a = $a;
        $this->b = $b;
    }
    public function plyus()
    {
        return $this->a + $this->b;
    }
}
$obekt = new C1(67, 134);
echo $obekt->plyus();
// 3
