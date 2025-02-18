<h3>섭씨 -> 화씨 온도 변환</h3>
<table border="1"width="300">   
<tr align="center"><td width"150">섭씨</td><td>화씨</td></tr>
<?php
    for ($c=-15; $c<=35; $c=$c+5)
    {
        $f = $c * 9 / 5 + 32;
        echo "<tr align='center'><td>$c</td><td>$f</td></tr>";
    }
?>
</table>


