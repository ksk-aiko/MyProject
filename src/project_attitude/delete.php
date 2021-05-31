<?php

require_once(__DIR__ . '/database/mysqli.php');

$link = dbConnect();
$postArray = $_POST['delete'];
$id = (int) $postArray;
$sql = "DELETE FROM attitudes WHERE id = {$id}";
$result = mysqli_query($link, $sql);
$message = 'no error';
if (!$result) {
    error_log('【Error】:fail to delete');
    error_log('【Debugging error】:') . mysqli_error($link);
}
mysqli_close($link);
header("Location: index.php");
