<?php

require_once(__DIR__ . 'RealItem.php');

class RealVendingMachine
{
    //マジックナンバーは使わない　数値に意味を与える
    private const MAX_CUP_NUMBER = 100;

    //プロパティを宣言し、初期化する
    private  $depositedCoin = 0;
    private  $cupNumber = 0;

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
        //ToDo:続きを模写する
    }
}