<?php


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

require_once(__DIR__ . '/database/mysqli.php');

$link = dbConnect();
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
        <div class="index">
            <div class="header mt-5 bg-primary p-2" style=" font-family:'HG行書体'; text-align:center; color:white;">
                <h1 style="font-size:40px;">これまでに学んだ心構え</h1>
            </div>
            <div class="attitudes card" style="">
                <ul class="list-group list-group-flush">
                    <?php foreach ($attitudes as $knowledge) : ?>
                        <div>
                            <li class="list-group-item" style="font-size: 20px; font-weight:bold;"><?php echo $knowledge['content']; ?></li>
                        </div>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="back" style="text-align: center;">
            <a href="form.php" style="font-size:30px;">最初の画面に戻る</a>
        </div>
    </div>
</body>
