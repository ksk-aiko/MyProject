<?php

class VendingMachine
{
    private const PRICE_OF_DRINK = 100;

    private int $depositedCoin = 0;

    public function depositCoin(int $coinAmount):int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }

        return $this->depositedCoin;
    }

    public function pressButton():string
    {
        if ($this->depositedCoin >= $this::PRICE_OF_DRINK) {
            $this->depositedCoin -= $this::PRICE_OF_DRINK;
            return 'cider';
        } else {
            return '';
        }
    }
}