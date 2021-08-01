lib/poker/PokerGame.php
```
<?php

require_once('PokerCard.php');
require_once('PokerHandEvaluator.php');

class PokerGame
{
    public function __construct(private array $cards1, private array $cards2)
    {
    }

    public function start(): array
    {
        $hands = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            /*
             * NOTE: PokerPlayer クラスは今回削除しました。
             *
             * 元々 PokerPlayer クラスを使用していたのは「複数枚のカードをランクに変換する際にその処理を行うアクター」が必要だったためです。
             * 今回出力するものが、複数枚のカードのランクではなく、それぞれの役に仕様変更されました。
             * そうなると、PokerHandEvaluator クラスがカードオブジェクトを受け取り、そこから役を出力すればよくなります。
             * つまり、「複数枚のカードをランクに変換する際にその処理を行うアクター」が不要になったわけです。
             * そのため、元々存在していた PokerPlayer クラスを回答例では削除しています。
             *
             * PokerPlayer クラスを残し、PokerHandEvaluator では入力としてカードランクを受け取るようにしても問題ございません。
             * しかし、PokerPlayer クラスがない方が全体の処理の流れがスッキリして理解しやすくなるため、PokerPlayer クラスを削除しております。
             * このように、元々作成していたクラスでも、仕様の変更により不要になれば削除しリファクタリングしていきましょう。
             * なお、PokerPlayer クラスの削除に伴い、PokerPlayerTest クラスも削除しておきます。
             */
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $handEvaluator = new PokerHandEvaluator();
            $hands[] = $handEvaluator->getHand($pokerCards);
        }
        return $hands;
    }
}
```

lib/poker/PokerCard.php

```
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
```

lib/poker/PokerHandEvaluator.php

```
<?php

require_once('PokerCard.php');

class PokerHandEvaluator
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
```

tests/poker/PokerGameTest.php

```
<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerGame.php');

class PokerGameTest extends TestCase
{
    public function testStart()
    {
        $game = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game->start());
    }
}
```

tests/poker/PokerCardTest.php

```
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
```

tests/poker/PokerGameTest.php

```
<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/poker/PokerHandEvaluator.php');

class PokerHandEvaluatorTest extends TestCase
{
    public function testGetHand()
    {
        $handEvaluator = new PokerHandEvaluator();
        $this->assertSame('high card', $handEvaluator->getHand([new PokerCard('H5'), new PokerCard('C7')]));
        $this->assertSame('pair', $handEvaluator->getHand([new PokerCard('H10'), new PokerCard('C10')]));
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('DA'), new PokerCard('S2')]));
        $this->assertSame('straight', $handEvaluator->getHand([new PokerCard('DA'), new PokerCard('SK')]));
    }
}
```

利用規約 プライバシーポリシー 特定商取引に関する表記 お問い合わせ
© 2020 独学エンジニア

