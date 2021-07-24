<?php

require_once(__DIR__ . '/Drink.php');
require_once(__DIR__ . '/DepositCoin.php');

class VendingMachine
{
    public function __construct()
    {
        
    }

    public function start()
    {
        $coin = new Coin();
        $depositedCoin = $coin->depositCoin($coinAmount);

    }

    // public function pressButton():string
    // {
    //     //単一責任の原則に沿って、書き換える
    //     // if ($this->depositedCoin >= $this::PRICE_OF_DRINK) {
    //     //     $this->depositedCoin -= $this::PRICE_OF_DRINK;
    //     //     return $drink;
    //     // } else {
    //     //     return '';
    //     // }



    //     retun $drink;
    // }
}
