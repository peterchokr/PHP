<?php
	$besu = 3;      // 3의 배수를 판별, 만약 $besu=5 이면 5의 배수를
                       // 판별하고자 함.
	$num = 12;	// 3의 배수인지를 판별하고자 하는 대상 숫자

	if ($num % $besu == 0) {
	   echo "$num : $besu"."의 배수이다.";
        }
	else {
	   echo "$num : $besu"."의 배수가 아니다.";
	}
?>
