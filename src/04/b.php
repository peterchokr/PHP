<?php
$x = $_POST["x"];
$y = $_POST["y"];

echo "<table border='1'><tr><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td></tr><tr>";

$tt = "<td>$y</td>";
$tx = "<td></td>";

for ($i=0; $i<5; $i++){
  if ($i==0 && $x=="월") {
    echo $tt ;
  }
  elseif ($i==1 && $x=="화") {
    echo $tt;
  }
  elseif ($i==2 && $x=="수") {
    echo $tt;
  }
  elseif ($i==3 && $x=="목") {
    echo $tt;
  }
  elseif ($i==4 && $x=="금") {
    echo $tt;
  }
  else{
    echo $tx;}
}
echo "</tr></table>";

?>
