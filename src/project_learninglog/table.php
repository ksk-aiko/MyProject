<?php


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ラーニングログ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><?php echo $_POST['title']; ?></h2>
                <p class="card-text">
                書籍が追加されました<br>
                これからラーニングログアプリを<br>
                作り込んでいきましょう！
                </p>
            </div>
        </div>
    </div>
</body>

</html>
