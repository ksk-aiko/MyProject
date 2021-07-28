<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/vending_machine/self/VendingMachine.php');

class VendingMachineTest extends TestCase
{
    // public function testDepositCoin()
    // {
    //     $vendingMachine = new VendingMachine(100,'cider');
    //     $this->assertSame(0, $vendingMachine->depositCoin(0));
    //     $this->assertSame(0, $vendingMachine->depositCoin(150));
    //     $this->assertSame(100, $vendingMachine->depositCoin(100));
    // }

    public function testPressButton()
    {
        $vendingMachine = new VendingMachine(200, 'beer');
        $vendingMachine->start();
        $this->assertSame('beer', $vendingMachine->pressButton(200));
        # お金が投入されてない場合は購入できない
        // $this->assertSame('', $vendingMachine->pressButton());

        // 100円を入れた場合はジュースを購入できる
        // $vendingMachine->depositCoin(100);
        // $this->assertSame('cider', $vendingMachine->pressButton());
    }
}
