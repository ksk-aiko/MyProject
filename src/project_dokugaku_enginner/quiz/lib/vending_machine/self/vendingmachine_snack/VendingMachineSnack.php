<?php

require_once(__DIR__ . '/ItemDrink.php');
require_once(__DIR__ . '/ItemCupDrink.php');
require_once(__DIR__ . '/ItemSnack.php');


class VendingMachineSnack
{
    const MAX_CUP_NUMBER = 100;
    private int $depositedCoin = 0;
    private int $cupNumber = 0;


    public function depositCoin(int $coinAmount): int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }
        return $this->depositedCoin;
    }

    public function pressButton(ItemInterface $item): string
    {
        $price = $item->getPrice();
        $cupNumber = $item->getCupNumber();
        if ($this->depositedCoin >= $price && $this->cupNumber >= $cupNumber) {
            $this->depositedCoin -= $price;
            $this->cupNumber -= $cupNumber;
            return $item->getName();
        } else {
            return '';
        }
    }

    public function addCup($num): int
    {
        $this->cupNumber += $num;

        if ($this->cupNumber > self::MAX_CUP_NUMBER) {
            $this->cupNumber = self::MAX_CUP_NUMBER;
        }

        return $this->cupNumber;
    }
}
