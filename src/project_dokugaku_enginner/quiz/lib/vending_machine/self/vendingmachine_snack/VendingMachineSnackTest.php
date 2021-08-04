<?php

require_once(__DIR__ . '/VendingMachineSnack.php');

use PHPUnit\Framework\TestCase;

class VendingMachineSnackTest extends TestCase
{
    public function testPressButton()
    {
        $cider = new ItemDrink('cider');
        $cola = new ItemDrink('cola');
        $hotCupCoffee = new ItemCupDrink('hot cup coffee');
        $potatoChips = new ItemSnack('potato chips');
        $vendingMachine = new VendingMachineSnack();

        // $this->assertSame('', $vendingMachine->pressButton($cider));

        // $vendingMachine->depositCoin(100);
        // $this->assertSame('cider', $vendingMachine->pressButton($cider));

        // $vendingMachine->depositCoin(100);
        // $this->assertSame('', $vendingMachine->pressButton($cola));

        // $vendingMachine->depositCoin(100);
        // $vendingMachine->depositCoin(100);
        // $this->assertSame('cola', $vendingMachine->pressButton($cola));

        // $vendingMachine->depositCoin(100);
        // $this->assertSame('', $vendingMachine->pressButton($hotCupCoffee));

        // $vendingMachine->addCup(1);
        // $this->assertSame('hot cup coffee', $vendingMachine->pressButton($hotCupCoffee));

        $vendingMachine->depositCoin(100);
        $this->assertSame('', $vendingMachine->pressButton($potatoChips));

        $vendingMachine->depositCoin(100);
        $vendingMachine->depositCoin(100);
        $this->assertSame('potato chips', $vendingMachine->pressButton($potatoChips));


    }
}