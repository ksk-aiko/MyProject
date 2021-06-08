<?php


function listBooks($link)
{
    $sql = 'SELECT id, title FROM books;';
    $results = mysqli_query($link, $sql);
    $books = [];
    while ($book = mysqli_fetch_assoc($results)) {
        $books[] = $book;
    }
    return $books;
}

require_once(__DIR__ . '/database/mysqli.php');


$link = dbConnect();
$books = listBooks($link);
mysqli_close($link);

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
    <div class="container" style="width: 650px;">
        <?php foreach ($books as $book) : ?>
            <div class="card  mb-3 border-dark">
                <div class="card-body" >
                    <h2 class="card-title"><a href="./detail/web_tech.php"><?php echo $book['title']; ?></a></h2>
                    <!-- <p class="card-text">
                    書籍が追加されました<br>
                    これからラーニングログアプリを<br>
                    作り込んでいきましょう！
                </p> -->
                </div>
            </div>
        <? endforeach ?>
        <div class="back">
            <a href="./newbook.php" class="btn btn-success">戻る</a>
        </div>
    </div>
</body>

</html>
