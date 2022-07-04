<?php
	$i = 1;
	$count = 0;
	while ($i<=100)
	{
		if ($i % 3 != 0)
		{
			echo "$i ";
			$count++;
		}
		if ($count % 10 == 0)
			echo "<br>";
       
		$i++;
	}
?>