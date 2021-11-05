<?php

namespace BlackJack;

require_once('Dealer.php');
require_once('OnePlayerProcess.php');
require_once('TwoPlayerProcess.php');
require_once('ThreePlayerProcess.php');
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
            $this->divideProcess(new OnePlayerProcess());
        } elseif ($stdin === 2) {
            $this->divideProcess(new TwoPlayerProcess());
        } elseif ($stdin === 3) {
            $this->divideProcess(new ThreePlayerProcess());
        } else {
            echo '正しい数字を入力してください' . PHP_EOL;
        }
    }

    private function divideProcess(Process $process): void
    {
        $process->proceedProcess();
    }
}
