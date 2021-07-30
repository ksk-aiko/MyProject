<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/vending_machine/self/VendingMachineCoffee.php');

class VendingMachineCoffeeTest extends TestCase
{
public function testDepositCoin()
{
$vendingMachineCoffee = new VendingMachineCoffee();
$this->assertSame(0, $vendingMachineCoffee->depositCoin(0));
$this->assertSame(0, $vendingMachineCoffee->depositCoin(150));
$this->assertSame(100, $vendingMachineCoffee->depositCoin(100));
}

public function testPressButton()
{
$cider = new Beverage('cider');
$cola = new Beverage('cola');
$hotCupCoffee = new CupBeverage('hot cup coffee');
$vendingMachineCoffee = new VendingMachineCoffee();

# お金が投入されてない場合は購入できない
$this->assertSame('', $vendingMachineCoffee->pressButton($cider));

// 100円を入れた場合はサイダーを購入できる
$vendingMachineCoffee->depositCoin(100);
$this->assertSame('cider', $vendingMachineCoffee->pressButton($cider));

// 投入金額が100円の場合はコーラを購入できない
$vendingMachineCoffee->depositCoin(100);
$this->assertSame('', $vendingMachineCoffee->pressButton($cola));
// 投入金額が200円の場合はコーラを購入できる
$vendingMachineCoffee->depositCoin(100);
$this->assertSame('cola', $vendingMachineCoffee->pressButton($cola));

// カップが投入されてない場合は購入できない
$vendingMachineCoffee->depositCoin(100);
$this->assertSame('', $vendingMachineCoffee->pressButton($hotCupCoffee));

// カップを入れた場合は購入できる
$vendingMachineCoffee->addCup(1);
$this->assertSame('hot cup coffee', $vendingMachineCoffee->pressButton($hotCupCoffee));
}

public function testAddCup()
{
$vendingMachineCoffee = new VendingMachineCoffee();
$this->assertSame(99, $vendingMachineCoffee->addCup(99));
$this->assertSame(100, $vendingMachineCoffee->addCup(1));
$this->assertSame(100, $vendingMachineCoffee->addCup(1));
}
}