<?php

class Coin
{
    //投入された累計金額
    private int $depositedCoin = 0;

    public function __construct()
    {
        
    }

    //お金を入れる
    public function depositCoin(int $coinAmount):int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }

        return $this->depositedCoin;
    }
}