
<style>
table {border-collapse:collapse;  width:600px; }
td { border: solid 1px gray; text-align: center; padding:5px; }
</style>
<h3>- 구구단 표</h3>
<table>
<tr>
<td>2단</td>
<td>3단</td>
<td>4단</td>
<td>5단</td>
<td>6단</td>
<td>7단</td>
<td>8단</td>
<td>9단</td>
</tr>
<?php
	for($b=1; $b<=9; $b++)
	{
	    echo "<tr>";

	    for($a=2; $a<=9; $a++)
	    {
		$c = $a * $b;

		echo "<td>{$a}x{$b}=$c</td>";
	    }
        
            echo "</tr>";
 	}
?>
</table>