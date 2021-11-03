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
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(23, 19, 19, 18));
        //３人残り、３人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(18,18,18,24));
        //４人残り、２人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(18, 17, 19, 19));
        //４人残り、３人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(19, 18, 19, 19));
        //４人残り、４人同じ点数
        $threePlayer = new ThreePlayerProcess();
        $this->assertSame('今回の勝負は引き分けです' . PHP_EOL, $threePlayer->judge(20, 20, 20, 20));

    }
}