<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/TwoCardsPoker/TwoCardsPoker.php');

class TwoCardsPokerTest extends TestCase{

    public function testPoker()
    {
        $this->assertSame(['straight', 'straight', 2], showDown('SA', 'DK', 'C2', 'CA'));
    }
}
