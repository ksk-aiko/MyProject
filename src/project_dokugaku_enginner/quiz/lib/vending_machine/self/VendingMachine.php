<?php

require_once(__DIR__ . '/Drink.php');
require_once(__DIR__ . '/Coin.php');

class VendingMachine
{
    // private int $depositedCoin = 0;
    public function __construct(int $coinAmount, string $button)
    {
        $this->coinAmount = $coinAmount;
        $this->button = $button;
    }

    public function start()
    {
        $coin = new Coin();
        $depositedCoin = $coin->depositCoin($this->coinAmount);
        $this->pressButton($depositedCoin);
    }

    public function pressButton($depositedCoin): string
    {
        if ($depositedCoin < 100) {
            return '追加でお金を入れてください';
        } elseif ($depositedCoin >= 100 && $depositedCoin < 150) {
            if ($this->button === 'cider') {
                return 'cider';
            } elseif ($this->button === 'cola') {
                return 'お金が足りません。追加でお金を入れてください。';
            }
        } elseif (150 <= $depositedCoin && $depositedCoin < 200) {
            if ($this->button === 'cider') {
                return 'cider';
            } elseif ($this->button === 'cola') {
                return 'cola';
            } elseif ($this->button === 'beer') {
                return 'お金が足りません。追加でお金を入れてください。';
            }
        } else {
            if ($this->button === 'cider') {
                return 'cider';
            } elseif ($this->button === 'cola') {
                return 'cola';
            } elseif ($this->button === 'beer') {
                return 'beer';
            }
        }
    }
}
