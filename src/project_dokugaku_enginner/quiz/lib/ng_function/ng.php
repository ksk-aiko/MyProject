<?php

function handleData($input, $estimate, $rate, $screenX, $screenY)
{
    $estimatePrice = $estimate * 1.1 / $rate;
    updateDatabase($input);
    view($screenX);
    return $estimate;
}

//$screenYが使われていない
//型が明示されていない
//引数の意味がわかりにくい
//処理の関連性がわかりにくい

//回答を見て気付いたもの
　//何をする関数なのかわからない
　//関数内で複数の処理を行なっている
　//マジックナンバーを使っている
　//エラーの場合の処理を書いていない

