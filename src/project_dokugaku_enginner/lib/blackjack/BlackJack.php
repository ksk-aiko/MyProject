<?php

namespace BlackJack;

require_once('Player.php');
require_once('Dealer.php');
require_once('OnePlayerProcess.php');
require_once('OnePlayer.php');
require_once('TwoPlayerProcess.php');
require_once('TwoPlayer.php');
require_once('ThreePlayerProcess.php');
require_once('ThreePlayer.php');
require_once('Process.php');


class BlackJack
{
    public function __construct()
    {
    }

    public function start()
    {
        echo 'ブラックジャックを開始します' . PHP_EOL;
        echo '参加人数は何人ですか？：';
        $stdin = (int) trim(fgets(STDIN));
        if ($stdin === 1) {
            $this->controlProcess(new OnePlayerProcess());
        } elseif ($stdin === 2) {
            $twoPlayer = new TwoPlayerProcess();
            $twoPlayer->twoPlayerProcess();
        } elseif ($stdin === 3) {
            $threePlayer = new ThreePlayerProcess();
            $threePlayer->threePlayerProcess();
        } else {
            echo '正しい数字を入力してください' . PHP_EOL;
        }
    }

    private function controlProcess(Process $process): void
    {
        $process->proceedProcess();
    }
}
