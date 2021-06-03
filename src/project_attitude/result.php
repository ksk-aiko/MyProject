<?php

function createAttitude($link, $attitude)
{
    $createAttitude = <<<EOT
    INSERT INTO attitudes (
        content
    ) VALUES (
        "{$attitude}"
    );
    EOT;

    $result = mysqli_query($link, $createAttitude);
    if (!$result) {
        error_log('【Error】:fail to create');
        error_log('【Debugging error】:') . mysqli_error($link);
    }
}

function listAttitudes($link)
{
    $sql = 'SELECT content FROM attitudes;';
    $results = mysqli_query($link, $sql);
    $attitudes = [];
    while ($attitude = mysqli_fetch_assoc($results)) {
        $attitudes[] = $attitude;
    }
    return $attitudes;
}

require_once('database/mysqli.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $attitude = $_POST['input'];
}

$link = dbConnect();
createAttitude($link, $attitude);
$attitudes = listAttitudes($link);
mysqli_close($link);



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
        <h1 style="text-align:center; font-family:'HG行書体'; font-size:40px;">今日学んだ心構え</h1>
        <h2 style="text-align:center; font-family:'HG行書体';" class="mt-3">↓↓↓↓↓↓↓↓↓</h2>
        <h1 style="text-align:center; font-family:'HG行書体'; font-size:60px; color:white;" class="mt-3 bg-danger">
            <?php echo $_POST["input"]; ?>
        </h1>
        <div style="text-align:center;">
            <a href="form.php" style="font-size:30px;">最初の画面に戻る</a><br>
            <a href="index.php" style="font-size:30px;">これまでに学んだ心構えはコチラ</a>

        </div>
        <div class="image mt-4">
            <img src="https://picsum.photos/1320/600" alt="">
            <h2 style="color: white; position:absolute; top:45%; left:20%; font-size:80px;">Attitudes for programming.</h2>
        </div>
    </div>
</body>
