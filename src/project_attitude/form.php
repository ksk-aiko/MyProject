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
        <h1 class="" style="font-size:80px; text-align:center; font-family:'HG行書体';">プログラミングの心構え</h1>
        <form action="result.php" method="post" autocomplete="off">
            <label class="form-label" style="font-family:'HG行書体';" for="attitude">
                今日学んだ心構え
            </label>
            <input type="text" name="input" id="attitude" class="form-control mt-3" style="font-family:'HG行書体';">
            <button type="submit" class="btn btn-primary mt-3">心構えを１つ追加</button>
        </form>
        <div class="transition mt-3">
            <a href="index.php" style="font-size:30px;">これまでに学んだ心構えはコチラ</a>

        </div>
        <div class="image mt-4">
            <img src="https://picsum.photos/1320/600" alt="">
            <h2 style="color: white; position:absolute; top:45%; left:20%; font-size:80px;">Attitudes for programming.</h2>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
