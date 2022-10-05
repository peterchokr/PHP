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
    echo "이름: ".$_POST["x"]."<br>";

    $posi =  "./ttt/";
    $newfn = date("Y-m-d")."-".date("H-i-s")."-".$_FILES["y"]["name"];

    move_uploaded_file($_FILES["y"]["tmp_name"], $posi.$newfn);

    if (($_FILES["y"]["type"] == "image/jpeg") || ($_FILES["y"]["type"] == "image/png") || ($_FILES["y"]["type"] == "image/gif"))
        echo '<img src="'.$posi.$newfn.'">';
    else
        echo $_FILES["y"]["name"]."을 저장했습니다.";

    // echo $_FILES["y"]["name"]."<br>";
    // echo $_FILES["y"]["type"]."<br>";
    // echo $_FILES["y"]["size"]."<br>";
    // echo $_FILES["y"]["tmp_name"]."<br>";
    // echo $_FILES["y"]["error"]."<br>";
    ?>
</body>
</html>
