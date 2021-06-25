<?php



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
        <h1 class="h2 text-dark">生体管理支援サービス</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" name="id" id="id">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-3">ログイン</button>
            </div>
        </form>
    </div>


</body>

</html>
