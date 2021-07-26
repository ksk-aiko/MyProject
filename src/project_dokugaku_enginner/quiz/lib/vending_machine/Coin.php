<?php

class Coin
{
    //投入された累計金額
    // private int $depositedCoin = 0;

    public function __construct( int $depositedCoin = 0)
    {
        $this->depositedCoin = $depositedCoin;
    }

    //お金を入れる
    public function depositCoin(int $coinAmount):int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        } else {
            return 0;
        }
    //投入されたお金の累計金額を返す
        return $this->depositedCoin;
    }
}