<?php
$a_recv = $_POST["arr"];
$a = unserialize(urldecode(($a_recv)));

for ($i=0; $i<count($a); $i++)
{
    echo $a[$i]."<br>";
}

//var_dump($a)
?>
