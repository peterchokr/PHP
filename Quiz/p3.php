<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    $prd_recv = $_POST["product"];
    ?>
</head>
<body>
    결제방식 선택<br>
    <form action="p4.php" method="post">
        <input type="radio" name="meth" id="" value="card" checked>카드결제<br>
        <input type="radio" name="meth" id="" value="book">무통장입금<br>
        <input type="radio" name="meth" id="" value="zero">페이결제<br>
        <input type="hidden" name="addr" value=<?= $_POST["addr"]?>>
        <input type="hidden" name="product" value="<?=$prd_recv?>">
        <input type="submit" value="결제완료">
    </form>

</body>
</html>
