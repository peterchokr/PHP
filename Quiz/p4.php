<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    $product = $_POST["product"];
    $productReceived = unserialize(urldecode($product));
    ?>
    
</head>
<body>
    요 약<br>
    1. 주문 상품 : <?php 
        for($i = 0; $i < count($productReceived); $i++){
            echo $productReceived[$i];
        }?><br>
    2. 배송지 주소 : <?php echo $_POST["addr"];?> <br>
    3. 결제 방식 : <?php echo $_POST["meth"];?><br>

</body>
</html>
