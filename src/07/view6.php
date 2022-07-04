<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet">
</head>
<?php
	$email1 = $_POST["email1"];
	$email2 = $_POST["email2"];
?>
<body>
	<ul>
		<li>이메일 : <?php echo $email1."@".$email2; ?></li>
	</ul>
</body>
</html>
