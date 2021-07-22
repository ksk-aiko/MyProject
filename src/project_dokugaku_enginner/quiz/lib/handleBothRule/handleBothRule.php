
<?php

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
function showResult(array $cards1, array $cards2): array
{
    if (count($cards1) === 3 && count($cards2) === 3) {
        threeCardsPoker($cards1, $cards2);
    } 
    if (count($cards1) === 2 && count($cards2) === 2) {
        twoCardsPoker($cards1, $cards2);
    } 

    return [];
}

//文字列をカードランクに変換する関数を定義
function convertToCardRanks(array $cards): array
{
    //回答例のように、array_mapとアロー関数で書くと下記のようになる
    return array_map(fn ($card) => CARD_RANK[substr($card, 1, strlen($card) - 1)], $cards);
}

function checkHands3(int $cardRank1, int $cardRank2, int $cardRank3): array
{
    //ランク変換されたプレイヤー毎の2枚のカードに対して、順位を付ける
    //役名の初期値をHIGH_CARDにしておく
    $ranksArray = [$cardRank1, $cardRank2, $cardRank3];
    rsort($ranksArray);
    $primary = $ranksArray[0];
    $secondary = $ranksArray[1];
    $tertiary = $ranksArray[2];
    $name = HIGH_CARD;

    if (isStraight3($cardRank1, $cardRank2, $cardRank3)) {
        $name = STRAIGHT;
        //A-2の組み合わせの場合、2がprimaryになる処理を書く
        if (oneTwoThree($cardRank1, $cardRank2, $cardRank3)) {
            $primary = $ranksArray[1];
            $secondary = $ranksArray[2];
            $tertiary = $ranksArray[0];
        }
    }

    if (isPair3($cardRank1, $cardRank2, $cardRank3)) {
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

function isStraight3(int $cardRank1, int $cardRank2, int $cardRank3): bool
{
    $ranksArray = [$cardRank1, $cardRank2, $cardRank3];
    //2枚のカードの差の絶対値が1か、カードランクの最小値と最大値の組み合わせであればストレートと判定する
    if (abs(max($ranksArray) - min($ranksArray)) === 2) {
        return true;
    } elseif (abs(max($ranksArray) - min($ranksArray)) === 12 && (array_sum($ranksArray) === 26 || array_sum($ranksArray) === 13)) {
        return true;
    } else {
        return false;
    }
}


function isPair3(int $cardRank1, int $cardRank2, int $cardRank3): bool
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

function isThreeCard(int $cardRank1, int $cardRank2, $cardRank3): bool
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

function decideWinner3(array $hands1, array $hands2): int
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

function threeCardsPoker(array $cards1, array $cards2):array
{
    $cardRanks1 = convertToCardRanks($cards1);
    $cardRanks2 = convertToCardRanks($cards2);
    $playerCardRanks = [$cardRanks1, $cardRanks2];
    $hands = array_map(fn ($playerCardRank) => checkHands3($playerCardRank[0], $playerCardRank[1], $playerCardRank[2]), $playerCardRanks);
    //勝者を判定する
    $winner = decideWinner3($hands[0], $hands[1]);
    return [$hands[0]['name'], $hands[1]['name'], $winner];
}

function twoCardsPoker(array $cards1, array $cards2):array
{
    $cardRanks1 = convertToCardRanks($cards1);
    $cardRanks2 = convertToCardRanks($cards2);
    $playerCardRanks = [$cardRanks1, $cardRanks2];
    $hands = array_map(fn ($playerCardRank) => checkHands($playerCardRank[0], $playerCardRank[1]), $playerCardRanks);
    //勝者を判定する
    $winner = decideWinner($hands[0], $hands[1]);
    return [$hands[0]['name'], $hands[1]['name'], $winner];
}

function checkHands(int $cardRank1, int $cardRank2): array
{
    //ランク変換されたプレイヤー毎の2枚のカードに対して、順位を付ける
    $primary = max($cardRank1, $cardRank2);
    $secondary = min($cardRank1, $cardRank2);
    //役名の初期値をHIGH_CARDにしておく
    $name = HIGH_CARD;

    if (isStraight($cardRank1, $cardRank2)) {
        $name = STRAIGHT;
        //A-2の組み合わせの場合、2がprimaryになる処理を書く
        if (isMinMax($cardRank1, $cardRank2)) {
            $primary = min(CARD_RANK);
            $secondary = max(CARD_RANK);
        }
    }

    if (isPair($cardRank1, $cardRank2)) {
        $name = PAIR;
    }


    //役の判定だけでなく、勝者判定のロジックを実装していくため、連想配列で返しておく
    return [
        'name' => $name,
        'rank' => HAND_RANK[$name],
        'primary' => $primary,
        'secondary' => $secondary,
    ];
}

function isStraight(int $cardRank1, int $cardRank2): bool
{
    //2枚のカードの差の絶対値が1か、カードランクの最小値と最大値の組み合わせであればストレートと判定する
    return abs($cardRank1 - $cardRank2) === 1 || isMinMax($cardRank1, $cardRank2);
}

function isPair(int $cardRank1, int $cardRank2): bool
{
    return $cardRank1 === $cardRank2;
}

function isMinMax($cardRank1, $cardRank2): bool
{
    return abs($cardRank1 - $cardRank2) === (max(CARD_RANK) - min(CARD_RANK));
}

function decideWinner(array $hands1, array $hands2):int
{
    foreach (['rank', 'primary', 'secondary'] as $k) {
        if ($hands1[$k] > $hands2[$k]) {
            return 1;
        }

        if ($hands1[$k] < $hands2[$k]) {
            return 2;
        }

    }
    return 0;
}


