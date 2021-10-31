<?php

use BlackJack\ThreePlayerProcess;
use BlackJack\ThreePlayer;
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../lib/blackjack/ThreePlayerProcess.php');

class ThreePlayerProcessTest extends TestCase
{
    public function testJudge()
    {
        //4人が22点以上
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(23, 22, 24, 25));
        //２人残り、２人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(23, 21, 24, 21));
        //３人残り、２人同じ点数（残りの１人の点数の方が低い）
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge());
        //３人残り、３人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge());
        //４人残り、２人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge());
        //４人残り、３人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge());
        //４人残り、４人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge());

    }
}