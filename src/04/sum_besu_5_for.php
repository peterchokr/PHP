<?php
    $sum = 0;

    for ($i=1; $i<=100; $i++)
    {
        if($i%5 == 0)
      $sum = $sum + $i;
    }

    echo "1~100의 정수 중 5의 배수의 합계 : $sum";
?>


