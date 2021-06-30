<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/function_anonymous/FunctionAnonymous.php');

class FunctionAnonymousTest extends TestCase{

    public function testAnonymous()
    {
        $this->assertSame(['3', '10', 'A'], convertToNumber('H3', 'S10', 'DA'));
    }
}
