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
    if ( !isset($_POST["x"]))
    {
    echo '<form action="a1.php" method="post">';
    echo '검색어 : <input type="text" name="x" id="">  <br>';
    echo '<input type="submit" value="검색하기">';
    echo '</form>';
    }
    else
    {
    echo '입력한 검색어 : '.$_POST["x"].'  <br>';
    echo '검색할 사이트를 선택하세요. <br>';
    echo '<a href="https://www.coupang.com/np/search?q='.$_POST["x"].'">쿠팡</a>  <br>';
    echo '<a href="https://search.11st.co.kr/Search.tmall?kwd='.$_POST["x"].'">11번가</a>';
    }
    ?>
</body>
</html>
