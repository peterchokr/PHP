<?php
    setcookie("userid", "", time() - 3600);
    setcookie("username", "", time() - 3600);
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
   	{
   		echo "userid와 username 쿠키가 삭제되었다!";
   	}
?>
</body>
</html>
