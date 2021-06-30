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
    <div class="registration">
        <p style="font-size: 20px; font-weight:bold;">生体情報を入力してください</p>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="breed" style="font-weight: bold;">犬種</label>
                <input type="text" name="breed" id="breed" class="form-control">
                <input type="submit" value="登録" class="btn btn-primary my-3">
            </div>
        </form>
    </div>
        <h1 class="bg-primary text-white" style="text-align: center;">一覧</h1>
    </div>
</body>
</html>
