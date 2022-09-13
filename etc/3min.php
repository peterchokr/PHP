/* 3개의 수에서 작은 순으로 출력하기
작성자 : 조정현  */

<?php
$a = 10;
$b = 5;
$c = 15;

if ($a < $b) {
    if ($a < $c) {
        $min1 = $a;
        if ($b < $c) {
            $min2 = $b;
            $min3 = $c;
        }
        else {
            $min2 = $c;
            $min3 = $b;
        }
    }
    else {
        $min1 = $c;
        $min2 = $a;
        $min3 - $b;
    }
}
else
{
    if ($b < $c)
    {
        $min1 = $b;
        if ($a < $c)
        {
            $min2 = $a;
            $min3 = $c;
        }
        else {
            $min2 = $c;
            $min3 = $a;
        }
    }
    else {
        $min1 = $c;
        $min2 = $b;
        $min3 = $a;
    }
}
?>
