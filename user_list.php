<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function sendid(x) 
        {
            opener.message_form.rv_id.value= x;

        }
    </script>
</head>
<body>
<?php
//1. DB연결
$con = mysqli_connect("localhost:3307", "root", "", "sample");

//2. DB사용 - 사용자 아이디 목록을 출력
$sql = "select * from members";

$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result); // 전체 글 수

if ($total_record != 0)
{
    for ($i=0; $i < $total_record; $i++)
    {
       mysqli_data_seek($result, $i);
       // 가져올 레코드로 위치(포인터) 이동
       $row = mysqli_fetch_array($result);
?>
       <a href='javascript:sendid(<?= $row["id"]?>)'><?=$row["id"]?></a>(<?=$row["name"]?>)<br>;
<?php
    }

}


//3. DB 연결 해제
mysqli_close($con);




?>
</body>
</html>
