<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$t = 0;
if (array_key_exists("a", $_POST) && array_key_exists("b", $_POST))
{
    function ttt($x, $y) 
    {
        $result = $x + $y;
        return $result;
    }

    $t = ttt($_POST["a"], $_POST["b"]);
}
 ?>
    <form action="p1.php" method="post">
    <input type="text" name="a" id=""> <br>
    + <br>
    <input type="text" name="b" id=""> <br>
    <input type="submit" value="계산하기">
    </form>
 
계산결과 : <?= $t ?>
</body>
</html>
