<h3>2단 구구단 표 만들기</h3>
<table border="1" width="100">
<?php
  $a = 2;
        $b = 1;                  
  while ($b <= 9)           
    {
      $c = $a * $b;
      echo "<tr><td align='center'>$a x $b = $c</td></tr>";     
      $b++;       
  }
?>
</table>
