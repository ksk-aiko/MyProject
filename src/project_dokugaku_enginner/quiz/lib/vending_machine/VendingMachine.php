<?php

require_once(__DIR__ . '/Drink.php');
require_once(__DIR__ . '/DepositCoin.php');

class VendingMachine
{
    
    public function __construct(int $coinAmount)
    {
        $this->coinAmount = $coinAmount;
    }

    public function start()
    {
        $coin = new Coin();
        $depositedCoin = $coin->depositCoin($this->coinAmount);

    }

    public function pressButton(string $button):string
    {
        if ($this->depositedCoin < 100) {
            echo '追加でお金を入れてください';
        } 

        

        }





    }
}
