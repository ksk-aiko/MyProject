<?php

require_once(__DIR__ . '/../answer/VendingMachine2.php');
require_once(__DIR__ . '/Beverage.php');
require_once(__DIR__ . '/CupBeverage.php');

class VendingMachineCoffee extends VendingMachine2
{
    private int $totalCup = 0;

    public function addCup(int $num): int
    {
        $this->totalCup += $num;

        if ($this->totalCup >= 100) {
            return 100;
        }

        return $this->totalCup;
    }

    public function pressButton(Item $item): string
    {
        if ($item->getName() === 'hot cup coffee' || $item->getName() === 'ice cup coffee'){
            if ($this->totalCup === 0) {
                return '';
            }
        }
        $price = $item->getPrice();
        if ($this->depositedCoin >= $price) {
            $this->depositedCoin -= $price;
            return $item->getName();
        } else {
            return '';
        }
    }
}
