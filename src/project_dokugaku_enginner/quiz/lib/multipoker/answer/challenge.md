# ◯お題1

## 「ツーカードポーカー」に以下の仕様変更が発生しました。

1. カードが2枚の場合、勝敗を判定する処理を追加してください  
2. カードが3枚の場合、勝敗を判定する処理を追加してください  

    勝敗の判定は以下のルールに則ってください。

**カード2枚の場合は、以下のルールに従い役の判定を行います**
* ハイカード：以下の役が一つも成立していない
* ペア：2枚のカードが同じ数字
* ストレート：2枚のカードが連続している。A は 2 と K の両方と連続しているとみなし、A を含むストレートは、A-2 と K-A の2つです  
* カード2枚の場合の手札について、強さは以下に従います
    * 2つの手札の役が異なる場合、より上位の役を持つ手札が強いものとする
    * 2つの手札の役が同じ場合、各カードの数値によって強さを比較する
　  * （弱）2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A (強)
　  * ハイカード：一番強い数字同士を比較する。左記が同じ数字の場合、もう一枚のカード同士を比較する
　 * ペア：ペアの数字を比較する
　 * ストレート：一番強い数字を比較する (ただし、A-2 の組み合わせの場合、2 を一番強い数字とする。K-A が最強、A-2 が最弱)
　 * 数値が同じ場合：引き分け  

**カード3枚の場合は、以下のルールに従い役の判定を行います**
* ハイカード：以下の役が一つも成立していない
* ペア：2枚のカードが同じ数字
* ストレート：3枚のカードが連続している。A は 2 と K の両方と連続しているとみなし、A を含むストレートは、A-2-3 と Q-K-A の2つです。ただし、K-A-2 のランクの組み合わせはストレートとはみなさない
* スリーカード：3枚のカードが同じ数字
* カード3枚の場合の手札について、強さは以下に従います
    * 2つの手札の役が異なる場合、より上位の役を持つ手札が強いものとする
    * 2つの手札の役が同じ場合、各カードの数値によって強さを比較する
　 ・（弱）2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A (強)
　 ・ハイカード：一番強い数字同士を比較する。  左記が同じ数字の場合、二番目に強いカード同士を比較する。左記が同じ数字の場合、三番目に強いランクを持つカード同士を比較する。左記が同じランクの場合は引き分け
　 ・ペア：ペアの数字を比較する。左記が同じランクの場合、ペアではない3枚目同士のランクを比較する。左記が同じランクの場合は引き分け
　 ・ストレート：一番強い数字を比較する (ただし、A-2-3 の組み合わせの場合、3 を一番強い数字とする。Q-K-A が最強、A-2-3 が最弱)。一番強いランクが同じ場合は引き分け
　 ・スリーカード：スリーカードの数字を比較する。スリーカードのランクが同じ場合は引き分け
それぞれの役と勝敗を判定するプログラムを作成ください。

## ◯仕様1

プログラムを実行すると「プレイヤー1の役、プレイヤー2の役、勝利したプレイヤーの番号」を返します。引き分けの場合、プレイヤーの番号は0とします
## ◯テスト例1

以下のテストが通るようにしましょう。他のクラスは自分で設計しましょう。

tests/poker/PokerGameTest.php  

```
class PokerGameTest extends TestCase
{
    public function testStart()
    {
        // カードが2枚の場合
        $game1 = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight', 2], $game1->start());

        // カードが3枚の場合
        $game2 = new PokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three card', 'straight', 1], $game2->start());
    }
}
```

# ◯お題2

「自動販売機」に以下の仕様変更が発生しました。

* 返却ボタンを押すとお釣りが返ってくる処理を追加してください  
* 商品がそれぞれ決められた本数しか格納できず、在庫がなくなった商品は購入できない処理を追加してください  

## ◯テスト例2

以下のテストが通るようにしましょう。他のクラスは自分で設計しましょう。

tests/vending_machine/VendingMachineTest.php

```
class VendingMachineTest extends TestCase
{
    public function testDepositCoin()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(0, $vendingMachine->depositCoin(0));
        $this->assertSame(0, $vendingMachine->depositCoin(150));
        $this->assertSame(100, $vendingMachine->depositCoin(100));
    }

    public function testPressButton()
    {
        $cider = new Drink('cider');
        $cola = new Drink('cola');
        $hotCupCoffee = new CupDrink('hot cup coffee');
        $snack = new Snack();
        $vendingMachine = new VendingMachine();

        # お金が投入されてない場合は購入できない
        $this->assertSame('', $vendingMachine->pressButton($cider));

        // 100円を入れた場合
        $vendingMachine->depositCoin(100);
        // 商品の在庫がないと購入できない
        $this->assertSame('', $vendingMachine->pressButton($cider));
        // 商品の在庫があると購入できる
        $vendingMachine->depositItem($cider, 1);
        $this->assertSame('cider', $vendingMachine->pressButton($cider));

        // 投入金額が100円の場合はコーラを購入できない
        $vendingMachine->depositCoin(100);
        $vendingMachine->depositItem($cola, 1);
        $this->assertSame('', $vendingMachine->pressButton($cola));
        // 投入金額が200円の場合はコーラを購入できる
        $vendingMachine->depositCoin(100);
        $this->assertSame('cola', $vendingMachine->pressButton($cola));

        // カップが投入されてない場合は購入できない
        $vendingMachine->depositCoin(100);
        $vendingMachine->depositItem($hotCupCoffee, 1);
        $this->assertSame('', $vendingMachine->pressButton($hotCupCoffee));
        // カップを入れた場合は購入できる
        $vendingMachine->addCup(1);
        $this->assertSame('hot cup coffee', $vendingMachine->pressButton($hotCupCoffee));

        // スナックも購入できる
        $vendingMachine->depositCoin(100);
        $vendingMachine->depositItem($snack, 1);
        $this->assertSame('potato chips', $vendingMachine->pressButton($snack));
    }

    public function testAddCup()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(99, $vendingMachine->addCup(99));
        $this->assertSame(100, $vendingMachine->addCup(1));
        $this->assertSame(100, $vendingMachine->addCup(1));
    }

    public function testDepositItem()
    {
        $vendingMachine = new VendingMachine();
        $cider = new Drink('cider');
        # サイダーの在庫の上限が50個の場合
        $this->assertSame(50, $vendingMachine->depositItem($cider, 50));
        $this->assertSame(50, $vendingMachine->depositItem($cider, 1));
    }

    public function testReceiveChange()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame(0, $vendingMachine->receiveChange());
        $vendingMachine->depositCoin(100);
        $this->assertSame(100, $vendingMachine->receiveChange());
    }
}
```

※今回、回答例はございません。回答なしでチャレンジしてみましょう。


