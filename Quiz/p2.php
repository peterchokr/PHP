<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    $prd = $_POST["product"];
    ?>
</head>
<body> 
    배송지 주소 입력<br>
    <form action="p3.php" method="post">
        주소 : <input type="text" name="addr" id=""><br>
        <input type="hidden" name="product" value="<?=urlencode(serialize($prd))?>">
        <input type="submit" value="완료">
    </form>
    
    
</body>
</html>
