<?php

//役は固定のものなので、バグを防ぐためにも定数化しておく
const HIGH_CARD = 'high card';
const PAIR = 'pair';
const STRAIGHT = 'straight';
const THREE_CARD = 'three card';
const CARDS = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
//即時関数で定数を定義
define('CARD_RANK', (function () {
    /*[]
    "2" => 0,
    "3" => 1,
    "4" => 2,
    ]
    を作る
    */
    $cardRanks = [];
    foreach (CARDS as $index => $card) {
        $cardRanks[$card] = $index;
    }
    return $cardRanks;
})());
//役の強さを数値で管理する
const HAND_RANK = [
    HIGH_CARD => 1,
    PAIR => 2,
    STRAIGHT => 3,
    THREE_CARD => 4,
];
//メインの関数を定義
function show(string $card1_1, string $card1_2, string $card1_3, string $card2_1, string $card2_2, string $card2_3): array
{
    /*
    ランク(配列）に変換する
    例えば、[2,3,J,K]なら
    [0, 1, 9, 11]
    */
    $cardRanks = convertToCardRanks([$card1_1, $card1_2, $card1_3,  $card2_1, $card2_2, $card2_3]);
    //プレイヤー毎にランクの配列を分割する
    $playerCardRanks = array_chunk($cardRanks, 3);
    //役を判定する
    //プレイヤー毎のランク配列に、コールバック関数を適用し、それぞれの役を配列で返し、$handsに代入する
    $hands = array_map(fn ($playerCardRank) => checkHands($playerCardRank[0], $playerCardRank[1], $playerCardRank[2]), $playerCardRanks);
    //勝者を判定する
    $winner = decideWinner($hands[0], $hands[1]);
    return [$hands[0]['name'], $hands[1]['name'], $winner];
}

//文字列をカードランクに変換する関数を定義
function convertToCardRanks(array $cards): array
{
    //回答例のように、array_mapとアロー関数で書くと下記のようになる
    return array_map(fn ($card) => CARD_RANK[substr($card, 1, strlen($card) - 1)], $cards);
}

function checkHands(int $cardRank1, int $cardRank2, int $cardRank3): array
{
    //ランク変換されたプレイヤー毎の2枚のカードに対して、順位を付ける
    //役名の初期値をHIGH_CARDにしておく
    $ranksArray = [$cardRank1, $cardRank2, $cardRank3];
    rsort($ranksArray);
    $primary = $ranksArray[0];
    $secondary = $ranksArray[1];
    $tertiary = $ranksArray[2];
    $name = HIGH_CARD;

    if (isStraight($cardRank1, $cardRank2, $cardRank3)) {
        $name = STRAIGHT;
        //A-2の組み合わせの場合、2がprimaryになる処理を書く
        if (oneTwoThree($cardRank1, $cardRank2, $cardRank3)) {
            $primary = $ranksArray[1];
            $secondary = $ranksArray[2];
            $tertiary = $ranksArray[0];
        }
    }

    if (isPair($cardRank1, $cardRank2, $cardRank3)) {
        $name = PAIR;
    }

    if (isThreeCard($cardRank1, $cardRank2, $cardRank3)) {
        $name = THREE_CARD;
    }


    //役の判定だけでなく、勝者判定のロジックを実装していくため、連想配列で返しておく
    return [
        'name' => $name,
        'rank' => HAND_RANK[$name],
        'primary' => $primary,
        'secondary' => $secondary,
        'tertiary' => $tertiary
    ];
}

function isStraight(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    $ranksArray = [$cardRank1, $cardRank2, $cardRank3];
    //2枚のカードの差の絶対値が1か、カードランクの最小値と最大値の組み合わせであればストレートと判定する
    if (abs(max($ranksArray) - min($ranksArray)) === 2) {
        return true;
    } elseif(abs(max($ranksArray) - min($ranksArray)) === 12 && (array_sum($ranksArray) === 26 || array_sum($ranksArray) === 13) ){
        return true;
    } else {
        return false;
    }

    
}


function isPair(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    if ($cardRank1 === $cardRank2) {
        return true;
    } elseif ($cardRank2 === $cardRank3) {
        return true;
    } elseif ($cardRank3 === $cardRank1) {
        return true;
    } else {
        return false;
    }
}

function isThreeCard(int $cardRank1, int $cardRank2, $cardRank3) :bool
{
    if ($cardRank1 === $cardRank2) {
        if ($cardRank2 === $cardRank3) {
            return true;
        }
    }

    return false;
}

function oneTwoThree($cardRank1, $cardRank2, $cardRank3): bool
{
    $ranksArray = [$cardRank1, $cardRank2, $cardRank3];
    rsort($ranksArray);
    if (abs(max($ranksArray) - min($ranksArray)) === 12 && array_sum($ranksArray) === 13) {
        return true;
    }

    return false;
}

function decideWinner(array $hands1, array $hands2): int
{
    foreach (['rank', 'primary', 'secondary', 'tertiary'] as $k) {
        if ($hands1[$k] > $hands2[$k]) {
            return 1;
        }

        if ($hands1[$k] < $hands2[$k]) {
            return 2;
        }
    }
    return 0;
}
/*
------------------------------【最初に自分で書いたコード】-------------------------------------------
// プレイヤー１の役を判定する
    // カードの数値部分のみ取り出す
    $numCard1_1 = substr($card1_1, 1);
    $numCard1_2 = substr($card1_2, 1);
    if ($numCard1_1 === $numCard1_2) {
        $role1 = 'pair';
    } elseif (abs($numCard1_1 - $numCard1_2) === 1 || abs($numCard1_1 - $numCard1_2) === 12 ) {
        $role1 = 'straight';
    } else {
        $role1 = 'high card';
    }

// プレイヤー2の役を判定する
    $numCard2_1 = substr($card2_1, 1);
    $numCard2_2 = substr($card2_2, 1);
    if ($numCard2_1 === $numCard2_2) {
        $role2 = 'pair';
    } elseif (abs($numCard2_1 - $numCard2_2) === 1 || abs($numCard2_1 - $numCard2_2) === 12) {
        $role2 = 'straight';
    } else {
        $role2 = 'high card';
    }

    // ２つの役を比較する
        // 役が違う場合
    if ($role1=== 'pair' && $role2 === 'straight') {
        $winner = 1;
    } elseif ($role1 === 'pair' && $role2 === 'highcard') {
        $winner = 1;
    } elseif ($role1 === 'straight' && $role2 === 'pair') {
        $winner = 2;
    } elseif ($role1 === 'straight' && $role2 === 'highcard') {
        $winner = 1;
    } elseif ($role1 === 'highcard' && $role2 === 'pair') {
        $winner = 2;
    } elseif ($role1 === 'highcard' && $role2 === 'straight') {
        $winner = 2;
    }

        // 役が同じ場合
    if ($role1 === 'high card' && $role2 === 'high card') {
        $max1 = max([$numCard1_1, $numCard1_2]);
        $max2 = max([$numCard2_1, $numCard2_2]);
        if ($max1 > $max2) {
            $winner = 1;
        } elseif ($max1 < $max2) {
            $winner = 2;
        } else {
            $min1 = min([$numCard1_1, $numCard1_2]);
            $min2 = min([$numCard2_1, $numCard2_2]);
            if ($min1 > $min2) {
                $winner = 1;
            } elseif ($min1 < $min2) {
                $winner = 2;
            } else {
                $winner = 0;
            }
        }
    } elseif ($role1 === 'pair' && $role2 === 'pair') {
        if ($numCard1_1 > $numCard2_1) {
            $winner = 1;
        } elseif ($numCard1_1 < $numCard2_1) {
            $winner = 2;
        } else {
            $winner = 0;
        }
    } elseif ($role1 === 'straight' && $role2 === 'straight') {
        $max1 = max([$numCard1_1, $numCard1_2]);
        $max2 = max([$numCard2_1, $numCard2_2]);
        if ($max1 > $max2) {
            $winner = 1;
        } elseif ($max1 < $max2) {
            $winner = 2;
        } else {
            $winner = 0;
        }
    }
// 勝者を決める
//引き分けの場合は $winner = 0;



    return [$role1, $role2, $winner];
    -----------------------------------------------------------------------------------------------
    */


/*
----------------------------------【自分で最初に書いたコード】---------------------------------------
function convertToCardRanks (array $cards):array {
    $cardRanks = [];
    foreach ($cards as $card) {
        $num = substr($card, 1);
        $cardRanks[] = CARD_RANK[$num];

    }
    return $cardRanks;
}
-------------------------------------------------------------------------------------------------------
*/
