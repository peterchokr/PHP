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
    echo $_POST["x"]."<br>";
    echo $_POST["y"]."<br>";

    $k = "./ttt/".date("Y-m-d").date("H-i-s").$_FILES["z"]["name"];
    move_uploaded_file($_FILES["z"]['tmp_name'], $k);

    if (($_FILES["z"]['type'] == "image/gif") || ($_FILES["z"]['type'] == "image/jpeg") || ($_FILES["z"]['type'] == "image/png"))
        echo '<img src='.$k.' ,width=200, height=100>';
    else 
        echo "첨부한 파일을 저장했습니다.";
    // echo $_FILES["z"]["name"]."<br>";
    // echo $_FILES["z"]['type']."<br>";
    // echo $_FILES["z"]['size']."<br>";
    // echo $_FILES["z"]['tmp_name']."<br>";
    // echo $_FILES["z"]['error']."<br>"  ;          
?>   
</body>
</html>
