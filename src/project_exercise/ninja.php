<?php

$list = [
    1 => '忍者',
    2 => ['CO', 'DE'],
    3 => '{"text1":"無", "text2":"料"}',
    4 => [
      401 => '集',
      402 => '人参',
      403 => '問題',
    ],
  ];

  $word1 = $list[1];
  $word2 = implode($list[2]);
  $word3 = json_decode($list[3])->text1 . json_decode($list[3])->text2;
  $word4 = $list[4][403] . $list[4][401];
  echo $word1 . $word2 . $word3 . $word4 . PHP_EOL;
