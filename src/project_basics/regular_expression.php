<?php



?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>基礎を鍛えるアプリ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheets/style.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;" class="bg-primary text-white">正規表現の一覧</h1>
        <table class="table" style="font-size: 30px;">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">表現</th>
                    <th scope="col">名称</th>
                    <th scope="col">意味</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>.</td>
                    <td>メタ文字</td>
                    <td>改行を除く任意の１文字</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>\</td>
                    <td>エスケープ文字</td>
                    <td>リテラルであることを明示</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>\d</td>
                    <td>digit</td>
                    <td>数字の１文字</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>\D</td>
                    <td>digit以外</td>
                    <td>数値以外の１文字</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>\w</td>
                    <td>word</td>
                    <td>a-z, A-Z, 0-9, _ のいづれか１文字</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>\W</td>
                    <td>word以外</td>
                    <td>a-z, A-Z, 0-9, _ 以外の１文字</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>\s</td>
                    <td>space</td>
                    <td>空白、タブ、改行</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>\S</td>
                    <td>space以外</td>
                    <td>空白、タブ、改行以外の１文字</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>{n}</td>
                    <td>量指定子</td>
                    <td>直前の文字をn回繰り返す</td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>{min, max}</td>
                    <td>量指定子</td>
                    <td>min以上、max以下</td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>{min, }</td>
                    <td>量指定子</td>
                    <td>min以上</td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>?</td>
                    <td>量指定子 {0, 1}</td>
                    <td>0個以上, 1個以下</td>
                </tr>
                <tr>
                    <th scope="row">13</th>
                    <td>+</td>
                    <td>量指定子 {1, }</td>
                    <td>1個以上</td>
                </tr>
                <tr>
                    <th scope="row">14</th>
                    <td>*</td>
                    <td>量指定子 {0, }</td>
                    <td>0個以上</td>
                </tr>
                <tr>
                    <th scope="row">15</th>
                    <td>^</td>
                    <td>キャレットハット</td>
                    <td>行の先頭</td>
                </tr>
                <tr>
                    <th scope="row">16</th>
                    <td>$</td>
                    <td>ダラー</td>
                    <td>行の末尾</td>
                </tr>
                <tr>
                    <th scope="row">17</th>
                    <td>/b</td>
                    <td>boundry</td>
                    <td>単語の境界</td>
                </tr>
                <tr>
                    <th scope="row">18</th>
                    <td>|</td>
                    <td>選択子</td>
                    <td>または</td>
                </tr>
                <tr>
                    <th scope="row">19</th>
                    <td>[ ]</td>
                    <td>文字クラス</td>
                    <td>[ ]の中のどれか１文字</td>
                </tr>
                <tr>
                    <th scope="row">20</th>
                    <td>[^ ]</td>
                    <td>文字クラスの^</td>
                    <td>否定</td>
                </tr>
                <tr>
                    <th scope="row">21</th>
                    <td>[- ]</td>
                    <td>範囲指定</td>
                    <td>文字コード表に基づき、範囲を指定</td>
                </tr>
                <tr>
                    <th scope="row">22</th>
                    <td>\t</td>
                    <td>タブ</td>
                    <td>タブを検索</td>
                </tr>
                <tr>
                    <th scope="row">23</th>
                    <td>\n</td>
                    <td>改行</td>
                    <td>Unixにおける改行</td>
                </tr>
                <tr>
                    <th scope="row">24</th>
                    <td>( ) $1 $2</td>
                    <td>キャプチャ</td>
                    <td>( )内を記憶し、置換で使う</td>
                </tr>
                <tr>
                    <th scope="row">25</th>
                    <td>( ) \1 \2</td>
                    <td>後方参照</td>
                    <td>( )内を記憶し、後ろで使う</td>
                </tr>
            </tbody>
        </table>
        <a href="index.php" style="font-size: 40px;">戻る</a>
    </div>
</body>

</html>
