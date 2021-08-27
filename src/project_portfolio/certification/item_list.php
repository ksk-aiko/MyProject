<?php

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>一覧画面</title>
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body>
    <h1>一覧</h1>
    <div align="center">
      <h2>Keisukeさん、お好きなピザを選んでください</h2>
      <form action="item_list.html" method="POST">
        <table class="menu" border="0" cellspacing="1">
          <tr>
            <th>商品</th>
            <th>価格</th>
          </tr>
          <tr>
            <td><input type="checkbox" name="" id="" />商品A</td>
            <td class="price">&yen;1000</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="" id="" />商品B</td>
            <td class="price">&yen;1000</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="" id="" />商品C</td>
            <td class="price">&yen;1000</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="" id="" />商品D</td>
            <td class="price">&yen;1000</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="" id="" />商品E</td>
            <td class="price">&yen;1000</td>
          </tr>
        </table>
        <input type="submit" value="チェックした商品をカートに入れる" />
      </form>

      <form action="cart.html">
        <input type="submit" value="カートを確認し、注文画面へ進む" />
      </form>

      <form action="login.html">
        <input type="submit" value="ログアウトする" />
      </form>
    </div>
  </body>
</html>
