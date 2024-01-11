<?php
   session_start();

   $userid = $_SESSION["userid"];
   $username = $_SESSION["username"];
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h3>등록된 세션의 사용</h3>
<ul>
    <li>등록된 세션(userid) : <?= $userid?></li>
    <li>등록된 세션(username) : <?= $username?></li>
</ul>
</table>
</body>
</html>
