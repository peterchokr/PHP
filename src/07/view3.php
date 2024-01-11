<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet">
</head>
<body>
<?php
	$content = $_POST["content"];
	
	// $content = str_replace("\n","<br>",$_POST["content"]);
?>
	<ul>
		<li>글 내용 : <?= $content?></li>
	</ul>
</body>
</html>
