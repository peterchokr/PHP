<?php   
	$tel = "010-2777-3333";
	echo "\$tel : $tel<br>";
	$num_tel = strlen($tel);                      // 문자열의 길이 계산
	
	echo "\$tel의 길이 : $num_tel<br>";
	
	$tel1 = substr($tel, 0, 3);                    // 앞에서 세 문자를 가져옴
	echo "$tel1<br>";
	$tel2 = substr($tel, 4, 4);		       // 네 번째 문자에서 네 개를 가져옴
	echo "$tel2<br>";
	$tel3 = substr($tel, 9, 4);		       // 아홉 번째 문자에서 네 개를 가져옴

	echo "$tel3<br>";

    $phone = explode("-", $tel);            	// 하이픈(-)을 기준으로 문자열 분리

	echo "전화번호 : $phone[0] $phone[1] $phone[2]<br>";
?>