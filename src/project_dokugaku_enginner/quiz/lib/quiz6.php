<?php
/*
【クイズ】2点間の距離を求めよう

２点 P1(x1, y1), P2(x2, y2) の距離を求めるプログラムを作成してください。
ただし、P1(1, 1)、P2(2, 2) とします。

※この場合の距離は 1.4142135623731 となります
※「2点間の距離の公式」を使うことで求められます
※「2点間の距離の公式」に登場する √ は「平方根」と呼びます
*/

$x1 = 1;
$x2 = 2;
$y1 = 1;
$y2 = 2;
$answer = sqrt(($x1 - $x2)**2 + ($y1 - $y2)**2);
echo $answer;
