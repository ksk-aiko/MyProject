<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/VendingMachine2.php');

class VendingMachine2Test extends TestCase
{
    public function testDepositCoin()
    {
        $vendingMachine2 = new VendingMachine2();
        $this->assertSame(0, $vendingMachine2->depositCoin(0));
        $this->assertSame(0, $vendingMachine2->depositCoin(150));
        $this->assertSame(100, $vendingMachine2->depositCoin(100));
    }

    public function testPressButton()
    {
        $cider = new Item('cider');
        $cola = new Item('cola');
        $vendingMachine2 = new VendingMachine2();

        # お金が投入されてない場合は購入できない
        $this->assertSame('', $vendingMachine2->pressButton($cider));

        // 100円を入れた場合はサイダーを購入できる
        $vendingMachine2->depositCoin(100);
        $this->assertSame('cider', $vendingMachine2->pressButton($cider));

        // 投入金額が100円の場合はコーラを購入できない
        $vendingMachine2->depositCoin(100);
        $this->assertSame('', $vendingMachine2->pressButton($cola));
        // 投入金額が200円の場合はコーラを購入できる
        $vendingMachine2->depositCoin(100);
        $this->assertSame('cola', $vendingMachine2->pressButton($cola));
    }
}