<?php

require_once(__DIR__ . '/Drink.php');
require_once(__DIR__ . '/Coin.php');

class VendingMachine
{
    
    public function __construct(int $coinAmount, string $button)
    {
        $this->coinAmount = $coinAmount;
        $this->button = $button;
    }

    public function start()
    {
        $coin = new Coin();
        $depositedCoin = $coin->depositCoin($this->coinAmount);
        $this->pressButton();
    }

    public function pressButton():string
    {
        if ($this->depositedCoin < 100) {
            echo '追加でお金を入れてください';
        }  elseif ($this->depositedCoin >= 100 && $this->depositedCoin < 150) {
            if ($this->button === 'cider') {
                return 'cider';
            } elseif ($this->button === 'cola' ) {
                echo 'お金が足りません。追加でお金を入れてください。';
            }
        } else {
            if ($this->button === 'cider') {
                return 'cider';
            } elseif ($this->button === 'cola' ) {
                return 'cola';
            }
        }

        

        }





    }
}
