<?php

require_once(__DIR__ . '/Item.php');

class VendingMachine2
{
    private int $depositedCoin = 0;

    public function depositCoin(int $coinAmount): int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }

        return $this->depositedCoin;
    }

    public function pressButton(Item $item): string
    {
        $price = $item->getPrice();
        if ($this->depositedCoin >= $price) {
            $this->depositedCoin -= $price;
            return $item->getName();
        } else {
            return '';
        }
    }
}