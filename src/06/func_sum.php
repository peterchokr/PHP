<?php
    // sum($a, $b) 함수는 $a에서 $b까지의 합을 구한다.
    function sum($a, $b)
    {
        $sum=0;
        while($a <= $b)
        {
            $sum=$sum+$a;
            $a++;
        }
        return $sum;
    }

    $from = 1;
    $to   = 100;
	
    $total = sum($from, $to); 
    echo("$from 에서 $to 까지의 합 : $total");
?>
