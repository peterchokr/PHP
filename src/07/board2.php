<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
    $table1 = "free";
    $table2 = "qna";
?>
    <h3>자유게시판</h3>
    <a href="board_view.php?table=<?=$table1?>&type=list"> 목록보기</a>
    <br>
    <a href="board_view.php?table=<?=$table1?>&type=write"> 글쓰기</a>

    <h3>질의응답 게시판</h3>
    <a href="board_view.php?table=<?=$table2?>&type=list"> 목록보기</a>
    <br>
    <a href="board_view.php?table=<?=$table2?>&type=write"> 글쓰기</a>
</body>
</html>