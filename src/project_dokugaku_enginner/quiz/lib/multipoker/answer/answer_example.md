このレクチャーの内容・補足
【クイズ】ツーカードポーカーで継承を使おう

◯お題

ツーカードポーカーで以下の仕様変更がありました。

カード2枚と3枚の両方に対応できるようにしてください
カード2枚の場合は、以下のルールに従い役の判定を行います
ハイカード：以下の役が一つも成立していない
ペア：2枚のカードが同じ数字
ストレート：2枚のカードが連続している。A は 2 と K の両方と連続しているとみなし、A を含むストレート は、A-2 と K-A の2つです
カード3枚の場合は、以下のルールに従い役の判定を行います
ハイカード：以下の役が一つも成立していない
ペア：2枚のカードが同じ数字
ストレート：3枚のカードが連続している。A は 2 と K の両方と連続しているとみなし、A を含むストレート は、A-2-3 と Q-K-A の2つ。ただし、K-A-2 のランクの組み合わせはストレートとはみなさない
スリーカード：3枚のカードが同じ数字
継承を使って実装しましょう。

◯仕様

プログラムを実行すると「プレイヤー1の役、プレイヤー2の役」を返します
◯テスト例

以下のテストが通るようにしましょう。他のクラスは継承を使って設計しましょう。

tests/poker/PokerGameTest.php

class PokerGameTest extends TestCase
{
    public function testStart()
    {
        // カードが2枚の場合
        $game1 = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game1->start());

        // カードが3枚の場合
        $game2 = new PokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three of a kind', 'straight'], $game2->start());
    }
}
回答例
lib/poker/PokerGame.php

<?php

require_once('PokerCard.php');
require_once('PokerHandEvaluator.php');
require_once('PokerTwoCardRule.php');
require_once('PokerThreeCardRule.php');

class PokerGame
{
    public function __construct(private array $cards1, private array $cards2)
    {
    }

    public function start(): array
    {
        $hands = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $rule = $this->getRule($cards);
            $handEvaluator = new PokerHandEvaluator($rule);
            $hands[] = $handEvaluator->getHand($pokerCards);
        }
        return $hands;
    }

    private function getRule(array $cards): PokerRule
    {
        $rule = new PokerTwoCardRule();
        if (count($cards) === 3) {
            $rule = new PokerThreeCardRule();
        }
        return $rule;
    }
}
lib/poker/PokerCard.php

<?php

class PokerCard
{
    public const CARD_RANK = [
        '2' => 1,
        '3' => 2,
        '4' => 3,
        '5' => 4,
        '6' => 5,
        '7' => 6,
        '8' => 7,
        '9' => 8,
        '10' => 9,
        'J' => 10,
        'Q' => 11,
        'K' => 12,
        'A' => 13,
    ];

    public function __construct(private string $suitNumber)
    {
    }

    public function getRank(): int
    {
        return self::CARD_RANK[substr($this->suitNumber, 1, strlen($this->suitNumber) - 1)];
    }
}
lib/poker/PokerHandEvaluator.php

<?php

require_once('PokerCard.php');
require_once('PokerRule.php');

class PokerHandEvaluator
{
    public function __construct(private PokerRule $rule)
    {
    }

    public function getHand(array $pokerCards)
    {
        return $this->rule->getHand($pokerCards);
    }
}
lib/poker/PokerRule.php

<?php

interface PokerRule
{
    public function getHand(array $cards);
}
lib/poker/PokerTwoCardRule.php

<?php

require_once('PokerCard.php');
require_once('PokerRule.php');

class PokerTwoCardRule implements PokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;

        if ($this->isStraight($cardRanks[0], $cardRanks[1])) {
            $name = self::STRAIGHT;
        } elseif ($this->isPair($cardRanks[0], $cardRanks[1])) {
            $name = self::PAIR;
        }

        return $name;
    }

    private function isStraight(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === 1 || $this->isMinMax($cardRank1, $cardRank2);
    }

    private function isMinMax(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === (max(PokerCard::CARD_RANK) - min(PokerCard::CARD_RANK));
    }

    private function isPair(int $cardRank1, int $cardRank2): bool
    {
        return $cardRank1 === $cardRank2;
    }
}
lib/poker/PokerThreeCardRule.php

<?php

require_once('PokerCard.php');
require_once('PokerRule.php');

class PokerThreeCardRule implements PokerRule
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';
    private const THREE_OF_A_KIND = 'three of a kind';

    public function getHand(array $pokerCards): string
    {
        $cardRanks = array_map(fn ($pokerCard) => $pokerCard->getRank(), $pokerCards);
        $name = self::HIGH_CARD;
        if ($this->isThreeOfAKind($cardRanks)) {
            $name = self::THREE_OF_A_KIND;
        } elseif ($this->isStraight($cardRanks)) {
            $name = self::STRAIGHT;
        } elseif ($this->isPair($cardRanks)) {
            $name = self::PAIR;
        }

        return $name;
    }

    private function isThreeOfAKind(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 1;
    }

    private function isStraight(array $cardRanks): bool
    {
        sort($cardRanks);
        return range($cardRanks[0], $cardRanks[0] + count($cardRanks) - 1) === $cardRanks || $this->isMinMax($cardRanks);
    }

    private function isMinMax(array $cardRanks): bool
    {
        return $cardRanks === [min(PokerCard::CARD_RANK), min(PokerCard::CARD_RANK) + 1, max(PokerCard::CARD_RANK)];
    }

    private function isPair(array $cardRanks): bool
    {
        return count(array_unique($cardRanks)) === 2;
    }
}
tests/poker/PokerGameTest.php

<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerGame.php');

class PokerGameTest extends TestCase
{
    public function testStart()
    {
        // カードが2枚の場合
        $game1 = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game1->start());

        // カードが3枚の場合
        $game2 = new PokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three of a kind', 'straight'], $game2->start());
    }
}
tests/poker/PokerCardTest.php

<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerCard.php');

class PokerCardTest extends TestCase
{
    public function testGetRank()
    {
        $card = new PokerCard('C10');
        $this->assertSame(9, $card->getRank());
    }
}
tests/poker/PokerHandEvaluatorTest.php

<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerHandEvaluator.php');

class PokerHandEvaluatorTest extends TestCase
{
    public function testGetHand()
    {
        // カードが2枚の場合
        $handEvaluator = new PokerHandEvaluator(new PokerTwoCardRule());
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('DA'), new PokerCard('SK')]));

        // カードが3枚の場合
        $handEvaluator = new PokerHandEvaluator(new PokerThreeCardRule());
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('DA'), new PokerCard('S2'), new PokerCard('C3')]));
    }
}
tests/poker/PokerTwoCardRuleTest.php

<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerTwoCardRule.php');

class PokerTwoCardRuleTest extends TestCase
{
    public function testGetHand()
    {
        $rule = new PokerTwoCardRule();
        $this->assertSame('high card', $rule->getHand([new PokerCard('H5'), new PokerCard('C7')]));
        $this->assertSame('pair', $rule->getHand([new PokerCard('H10'), new PokerCard('C10')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('DA'), new PokerCard('S2')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('DA'), new PokerCard('SK')]));
    }
}
tests/poker/PokerThreeCardRuleTest.php

<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerThreeCardRule.php');

class PokerThreeCardRuleTest extends TestCase
{
    public function testGetHand()
    {
        $rule = new PokerThreeCardRule();
        $this->assertSame('high card', $rule->getHand([new PokerCard('H5'), new PokerCard('C7'), new PokerCard('C9')]));
        $this->assertSame('high card', $rule->getHand([new PokerCard('HK'), new PokerCard('CA'), new PokerCard('C2')]));
        $this->assertSame('pair', $rule->getHand([new PokerCard('H10'), new PokerCard('C10'), new PokerCard('CJ')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('DA'), new PokerCard('S2'), new PokerCard('C3')]));
        $this->assertSame('straight', $rule->getHand([new PokerCard('DA'), new PokerCard('SQ'), new PokerCard('SK')]));
        $this->assertSame('three of a kind', $rule->getHand([new PokerCard('DA'), new PokerCard('SA'), new PokerCard('DA')]));
    }
}
利用規約 プライバシーポリシー 特定商取引に関する表記 お問い合わせ
© 2020 独学エンジニア

