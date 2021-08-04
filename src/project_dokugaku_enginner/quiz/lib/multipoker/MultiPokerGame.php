<?php

class MultiPokerGame
{
    public function __construct(array $cards1, array $cards2)
    {
        $this->cards1 = $cards1;
        $this->cards2 = $cards2;
    }

    public function start()
    {
        $playerCardRanks = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $player = new PokerPlayer($pokerCards);
            $playerCardRanks[] = $player->getCardRanks();
            //ここから先を書く　ランクの配列を返さずに、
            //役の判定を行い、プレイヤー１とプレイヤー２の役の
            //配列を返す

            //カード枚数が２枚だった場合、２枚のクラスを使う

            //カード枚数が３枚だった場合、３枚のクラスを使う

        }
    }
}
