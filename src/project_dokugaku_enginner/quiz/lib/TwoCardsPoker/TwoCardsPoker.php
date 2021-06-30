<?php

const ORDER = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 1];

function judgeRole(string $cardA, string $cardB): array
{
    if ($cardA[1] === $cardB[1]) {
        $role =  'pair';
        //数値同士の場合
        if (is_int($cardA[1]) && is_int($cardB[1])) {
            if (abs($cardA[1] - $cardB[1]) === 1) {
                $role =  'straight';
            }
        }
        //J,Q,K,Aの組み合わせを考慮
    } elseif ($cardA[1] === 'J' && $cardB[1] === 'Q') {
        $role = 'straight';
    } elseif ($cardA[1] === 'Q' && ($cardB[1] === 'J' || $cardB[1] === 'K')) {
        $role = 'straight';
    } elseif ($cardA[1] === 'K' && ($cardB[1] === 'Q' || $cardB[1] === 'A')) {
        $role = 'straight';
    } elseif ($cardA[1] === 'A' && ($cardB[1] === 'K' || $cardB[1] === '2')) {
        $role = 'straight';
    } elseif ($cardA[1] === '2' && ($cardB[1] === 'A')) {
        $role = 'straight';
    } else {
        $role = 'high card';
    }
    //役と最大値を返す
    $max = 0;
    //数値同士の場合
    if (is_int($cardA[1]) && is_int($cardB[1])) {
        $max = max($cardA[1], $cardB[1]);
        //J,Q,K,Aが存在する場合
        //片方が数値の場合
    } else {
        if (is_int($cardA[1]) && $cardB[1] === 'J' || $cardB[1] === 'Q' || $cardB[1] === 'K' || $cardB[1] === 'A') {
            $max = $cardB[1];
        } elseif (is_int($cardB[1]) && $cardA[1] === 'J' || $cardA[1] === 'Q' || $cardA[1] === 'K' || $cardA[1] === 'A') {
            $max = $cardA[1];
            //両方絵札の場合
        } elseif (!is_int($cardA[1]) && !is_int($cardB[1])) {
            if ($cardA[1] === 'J' && $cardB[1] === 'J') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'J' && $cardB[1] === 'Q') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'J' && $cardB[1] === 'K') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'J' && $cardB[1] === 'A') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'Q' && $cardB[1] === 'J') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'Q' && $cardB[1] === 'Q') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'Q' && $cardB[1] === 'K') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'Q' && $cardB[1] === 'A') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'K' && $cardB[1] === 'J') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'K' && $cardB[1] === 'Q') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'K' && $cardB[1] === 'K') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'K' && $cardB[1] === 'A') {
                $max = $cardB[1];
            } elseif ($cardA[1] === 'A' && $cardB[1] === 'J') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'A' && $cardB[1] === 'Q') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'A' && $cardB[1] === 'K') {
                $max = $cardA[1];
            } elseif ($cardA[1] === 'A' && $cardB[1] === 'A') {
                $max = $cardB[1];
            }

        }
    }
    return array($role, $max);
    }

        function judgeWin(array $role1, array $role2): int
        {
            // 役の組み合わせによって条件分岐し、勝者の番号を返す
            // 2つの役が異なる場合
            if ($role1[0] === 'pair' && $role2[0] === 'straight') {
                return 1;
            } elseif ($role1[0] === 'pair' && $role2[0] = 'highcard') {
                return 1;
            } elseif ($role1[0] === 'straight' && $role2[0] = 'pair') {
                return 2;
            } elseif ($role1[0] === 'straight' && $role2[0] = 'highcard') {
                return 1;
            } elseif ($role1[0] === 'highcard' && $role2[0] === 'pair') {
                return 2;
            } elseif ($role1[0] === 'highcard' && $role2[0] === 'straight') {
                return 2;
            }
            // 2つの役が同じ場合
                // 数値で比較する
                    // ハイカードの場合
            elseif ($role1[0] === 'highcard' && $role2[0] === 'highcard') {
                if ($role1[1] > $role2[1]) {
                    return 1;
                } else {
                    return 2;
                }
                // ペアの場合
            } elseif ($role1[0] === 'pair' && $role2[0] === 'pair') {
                if ($role1[1] > $role2[1]) {
                    return 1;
                } else {
                    return 2;
                }
            }
                // ストレートの場合
            elseif ($role1[0] === 'straight' && $role2[0] === 'straight') {
                if ($role1[1] > $role2[1]) {
                    return 1;
                } else {
                    return 2;
                }
            }
        }

        function showDown(string $card1_1, string $card1_2, string $card2_1, string $card2_2): array
        {
            // プレイヤー１の役を判定する
            $role1 = judgeRole($card1_1, $card1_2);
            // プレイヤー２の役を判定する
            $role2 = judgeRole($card2_1, $card2_2);
            // 役の勝敗を判定する

            $winner = judgeWin($role1, $role2);


            // 引き分けの場合

            return [$role1, $role2, $winner];
        }

        $result = showDown('CK', 'DJ', 'C10', 'H10');
        print_r($result);
