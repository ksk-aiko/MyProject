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
    <div class="header">
      <div class="header-left">基礎を鍛えるアプリ</div>
      <div class="header-right">
        <ul>
          <li>はじめに</li>
          <li>目的</li>
          <li class="selected">戦略</li>
        </ul>
      </div>
    </div>
    <div class="main">
      <div class="contact-form">
        <div class="form-title">お聞きします</div>
        <form action="sent.php" method="post" class="form-group">
          <label class="form-label" for="purpose">あなたの目的は何ですか？</label>
          <input type="text" name="purpose" id="purpose" class="form-control">
          <label class="form-label" for="strategy">戦略をお聞かせください</label>
          <textarea name="strategy" class="form-control" id="strategy"></textarea>
          <label for="age" class="form-label">あなたの年齢をお聞かせください</label><br>
          <select name="age" id="age">
            <option value="未選択">未選択</option>
            <?php for ($i=6; $i<=100; $i++): ?>
              <?php echo " <option value='{$i}歳'>{$i}歳</option> "; ?>
            <?php endfor ?>
          </select><br>
          <input type="submit" value="送信" class="btn btn-primary">
        </form>
      </div>
      <div class="introduction">
      こちらのページではよく使う関数を紹介しています
      </div>
      <div class="transmit"><a href="function.php">こちらをクリック</a></div>
    </div>
    <div class="footer">
      <div class="footer-left">
        <ul>
          <li>はじめに</li>
          <li>目的</li>
          <li class="selected">戦略</li>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>
