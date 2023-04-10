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
    echo $_POST["member"];
    echo "<br>";
    if ($_POST["member"] == "seoul")
        $seoul_incentive += 1;
    else if ($_POST["member"] == "busan")
               $busan_incentive += 1;

    echo "환영합니다. ".$_POST["myname"]."&nbsp;&nbsp;&nbsp;".$_POST["pw"];
    echo "<br>";
    $c = nl2br($_POST["profile"]);
    echo $c;
    echo "<br>";
    echo $_POST["styear"];
    echo "<br>";

    if (!empty($_POST["tour"]))
    {
        for ($i=0; $i < count($_POST["tour"]); $i++)
        {
            echo $_POST["tour"][$i];
            echo "<br>";
        }
    }
    else
    {
        echo "원하는 여행지가 선택되지 않았습니다";
        echo "<br>";
    }

    switch ($_POST["dcnt"])
    {
        case 01:
            echo "당일코스 - 여행비는 20,000원입니다.";
            break;
        case 12:
            echo "1박2일코스 - 여행비는 40,000원입니다.";
            break;   
        case 23:
            echo "2박3일코스 - 여행비는 60,000원입니다.";
            break;     
        case 34:
            echo "3박4일코스 - 여행비는 80,000원입니다.";
            break;                                
    }
    echo "<br>";

    // echo $_FILES["myf"]["name"];
    // echo "<br>";
    // echo $_FILES["myf"]["type"];
    // echo "<br>";
    // echo $_FILES["myf"]["size"];
    // echo "<br>";
    // echo $_FILES["myf"]["tmp_name"];
    // echo "<br>";
    // echo $_FILES["myf"]["error"];
    // echo "<br>";    

    // 클라이언튼에서 전달한 파일을 서버의 지정된 위치에 저장

    $file_dir = "C:/xampp/htdocs/php_3/src/07/myfile/";
    $x = $file_dir.date("Y-m-d-H-i-s").$_FILES["myf"]["name"];
    if (move_uploaded_file($_FILES["myf"]["tmp_name"], $x ))
        echo "저장 성공";
    else 
        echo "저장 실패";
    ?>

    <?php
    if ($_FILES["myf"]["type"] == "image/jpeg")
    {
        $y = "./myfile/".date("Y-m-d-H-i-s").$_FILES["myf"]["name"];
        echo '<img src='.$y.' alt="" width="200", height="100">';
    }
    else
    if ($_FILES["myf"]["type"] == "video/mp4")
    {
        $y = "./myfile/".date("Y-m-d-H-i-s").$_FILES["myf"]["name"];
        echo '<video src='.$y.' controls></video>';
    }
    else
        echo "이미지/동영상 파일이 아닙니다";
    ?>


</body>
</html>
