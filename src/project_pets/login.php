<?php

session_start();
$_SESSION['id'] = $_POST['id'];
$_SESSION['password'] = $_POST['password'];


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>生体管理支援サービス</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="h2 text-dark">生体管理支援サービス</h1>
        </div>
        <?php if ($_SESSION['id'] != 'keisuke' || $_SESSION['password'] != 'marony'):  ?>
            <div class="error">
                <h4 style="color: red;" class="my-3">ログインに失敗しました</h4>
                <a href="top.php" class="btn btn-primary">ログイン画面に戻る</a>
            </div>
        <?php else : ?>
        <div class="correct">
            <h4 style="color: blue;" class="my-3">ログインに成功しました</h4>
            <a href="service.php" class="btn btn-primary">生体管理支援サービスへ</a>
        </div>
        <?php endif ?>
    </div>
</body>

</html>
