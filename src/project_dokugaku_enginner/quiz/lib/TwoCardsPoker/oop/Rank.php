<?php

class Rank 
{
public function __construct(array $cards1, array $cards2)
{
    $this->cards1 = $cards1;
    $this->cards2 = $cards2;
}

    public function convert()
    {
        $num1_1 = substr($this->cards1[0], 1, strlen($this->cards1[0]));
        $num1_2 = substr($this->cards1[1], 1, strlen($this->cards1[1]));
        $num2_1 = substr($this->cards2[0], 1, strlen($this->cards2[0]));
        $num2_2 = substr($this->cards2[1], 1, strlen($this->cards2[1]));

        $results = [[CARD_RANK[$num1_1], CARD_RANK[$num1_2]],[CARD_RANK[$num2_1], CARD_RANK[$num2_2]]];

        return $results;

        
    }
}