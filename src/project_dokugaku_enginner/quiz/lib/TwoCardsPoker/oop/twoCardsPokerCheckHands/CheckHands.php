<?php

require_once(__DIR__ . '/Function.php');

class CheckHands
{
    public function __construct(array $playerCardRanks)
    {
        $this->playerCardRanks = $playerCardRanks;
    }

    
    public function hands()
    {
        $hands = [ ];
        foreach ($this->playerCardRanks as $playerCardRank) {
            if (whetherStraight($playerCardRank)) {
                $hands[] = 'straight';
            } elseif(whetherPair($playerCardRank)) {
                $hands[] = 'pair';
            } else {
                $hands[] = 'high card';
            }
        }
        //プレイヤー１の役を判定する
        //プレイヤー２の役を判定する
        //それぞれの役を配列にする
        //役の配列を返す
        return $hands;

    
    }
    
    
}