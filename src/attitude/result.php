<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プログラミングの心構え</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 style="text-align:center; font-family:'HG行書体'; font-size:80px;">今日学んだ心構え</h1>
        <h2 style="text-align:center; font-family:'HG行書体';" class="mt-3">↓↓↓↓↓↓↓↓↓</h2>
        <h1 style="text-align:center; font-family:'HG行書体'; font-size:100px; color:white;" class="mt-3 bg-danger">
        <?php echo $_POST["input"]; ?>
        </h1>
        <div class="container" style="text-align:center;">
            <a href="form.php" style="font-size:30px;" >最初の画面に戻る</a>
        </div>
    </div>
</body>
