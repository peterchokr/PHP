# 📝 3장 연습문제: 조건문, 반복문 & 함수

---

## 🎯 객관식 10문제

#### **1번. 다음 코드의 출력 결과는?**

```php
$score = 85;

if ($score >= 90) {
    echo "A학점";
} elseif ($score >= 80) {
    echo "B학점";
} else {
    echo "C학점";
}
```

① A학점
② B학점
③ C학점
④ 오류 발생

---

#### **2번. switch 문에서 break의 역할은?**

① 프로그램 전체를 종료한다
② 다음 case로 넘어가는 것을 방지한다
③ 반복문을 종료한다
④ 변수의 값을 초기화한다

---

#### **3번. 다음 코드의 결과는?**

```php
for ($i = 1; $i <= 3; $i++) {
    echo $i . " ";
}
```

① 1 2 3
② 0 1 2
③ 1 2 3 4
④ 3 2 1

---

#### **4번. while 루프를 한 번 이상 실행하고 싶을 때 사용하는 문법은?**

① while ($condition)
② do { } while ($condition)
③ for ($i = 0; $i < 10; $i++)
④ foreach ($array as $item)

---

#### **5번. foreach 루프에서 배열의 키(key)와 값(value)을 모두 얻으려면?**

① `foreach ($arr as $item)`
② `foreach ($arr as $key => $value)`
③ `foreach ($arr) { $key, $value }`
④ `foreach ($arr as [$key, $value])`

---

#### **6번. 다음 함수의 반환값은?**

```php
function add($a, $b = 5) {
    return $a + $b;
}

echo add(10);
```

① 5
② 10
③ 15
④ 오류 발생

---

#### **7번. 함수에서 break와 continue의 차이점은?**

① break는 루프를 멈추고, continue는 현재 반복을 건너뛴다
② continue는 루프를 멈추고, break는 현재 반복을 건너뛴다
③ 둘 다 같은 역할을 한다
④ break는 함수 외부로 탈출한다

---

#### **8번. 다음 코드의 결과는?**

```php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(4);
```

① 4
② 10
③ 24
④ 무한 루프

---

#### **9번. PHP에서 함수 내부에서 전역 변수를 사용하려면?**

① 함수의 매개변수로 전달한다
② global 키워드를 사용한다
③ $GLOBALS 배열을 사용한다
④ ① 또는 ② 또는 ③ 모두 가능하다

---

#### **10번. 다음 코드의 출력 결과는?**

```php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo $i . " ";
}
```

① 1 2 3 4 5
② 1 2 4 5
③ 1 2
④ 3 4 5

---

## 💻 실기작업형 5문제

### **문제 1: 학점 판정 프로그램**

**요구사항:**

- 점수를 받아서 학점을 판정 (if/elseif/else)
- 90점 이상: A, 80점 이상: B, 70점 이상: C, 60점 이상: D, 60점 미만: F
- "점수: 85점, 학점: B학점" 형식으로 출력

**파일명**: `grade.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 2: 구구단 출력 (특정 단)**

**요구사항:**

- for 반복문으로 5단 구구단 출력
- 형식: "5 × 1 = 5", "5 × 2 = 10", ... , "5 × 9 = 45"
- 최소 9번 반복

**파일명**: `multiplication.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 3: 배열 합계와 평균**

**요구사항:**

- 5명의 학생 점수를 배열에 저장: [80, 85, 90, 75, 88]
- foreach로 배열을 순회하며 합계 계산
- 평균 계산 (합계 / 개수)
- "합계: 418점, 평균: 83.6점" 형식으로 출력

**파일명**: `score_average.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 4: 숫자 판정 함수**

**요구사항:**

- isEven($num) 함수 작성 (짝수이면 true, 홀수이면 false 반환)
- 1부터 10까지의 짝수를 함수로 판정하여 출력
- "2는 짝수입니다", "4는 짝수입니다" 형식

**파일명**: `even_odd.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: 이메일 검증 함수 및 회원 처리**

**요구사항:**

- is_valid_email($email) 함수 작성 (@ 기호 포함 여부로 검증)
- 3명의 회원 정보를 배열에 저장
- foreach로 순회하며 함수로 검증
- "홍길동(hong@example.com) - 유효함", "김영희(invalid-email) - 유효하지 않음" 형식

**파일명**: `email_validation.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

---

## ✅ 정답 및 풀이

### **객관식 정답**

| 문제 | 정답                                                                                                                     | 풀이                                                                                         |
| ---- | ------------------------------------------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------------------- |
| 1번  | **② B학점**                                                                                                       | elseif 문은 첫 번째부터 차례로 확인합니다. 85는 90 이상이 아니지만 80 이상이므로 B학점입니다 |
| 2번  | **② 다음 case로 넘어가는 것을 방지한다**                                                                          | break가 없으면 fall-through 현상이 발생하여 다음 case의 코드도 실행됩니다                    |
| 3번  | **① 1 2 3**                                                                                                       | for 루프는$i=1부터 시작하여 $i<=3까지 1씩 증가하므로 1, 2, 3이 출력됩니다                  |
| 4번  | **② do { } while ($condition)**                                                                                   | do-while 문은 먼저 코드를 실행한 후 조건을 확인하므로 최소 한 번은 실행됩니다                |
| 5번  | **② `foreach ($arr as $key => $value)`** | 키와 값을 모두 얻으려면 `as $key => $value` 형식을 사용해야 합니다 |                                                                                              |
| 6번  | **③ 15**                                                                                                          | add(10)을 호출하면$a=10, $b는 기본값 5입니다. 따라서 10+5=15를 반환합니다                  |
| 7번  | **① break는 루프를 멈추고, continue는 현재 반복을 건너뛴다**                                                      | break는 반복을 완전히 종료하고, continue는 현재 반복만 건너뛰고 다음 반복을 수행합니다       |
| 8번  | **③ 24**                                                                                                          | factorial(4) = 4 × factorial(3) = 4 × 3 × 2 × 1 = 24입니다                               |
| 9번  | **④ ① 또는 ② 또는 ③ 모두 가능하다**                                                                            | 전역 변수를 사용하는 세 가지 방법 모두 PHP에서 가능합니다                                    |
| 10번 | **② 1 2 4 5**                                                                                                     | continue는 현재 반복을 건너뛰므로 $i=3일 때 echo를 실행하지 않습니다                         |

---

### **실기작업형 풀이**

#### **문제 1: 학점 판정 프로그램 - 정답**

```php
<?php
$score = 85;

if ($score >= 90) {
    $grade = "A학점";
} elseif ($score >= 80) {
    $grade = "B학점";
} elseif ($score >= 70) {
    $grade = "C학점";
} elseif ($score >= 60) {
    $grade = "D학점";
} else {
    $grade = "F학점";
}

echo "점수: " . $score . "점, 학점: " . $grade;
?>
```

**출력 결과:**

```
점수: 85점, 학점: B학점
```

---

#### **문제 2: 구구단 출력 (특정 단) - 정답**

```php
<?php
$dan = 5;

echo "<h3>" . $dan . "단 구구단</h3>";

for ($i = 1; $i <= 9; $i++) {
    $result = $dan * $i;
    echo $dan . " × " . $i . " = " . $result . "<br>";
}
?>
```

**출력 결과:**

```
5단 구구단
5 × 1 = 5
5 × 2 = 10
5 × 3 = 15
5 × 4 = 20
5 × 5 = 25
5 × 6 = 30
5 × 7 = 35
5 × 8 = 40
5 × 9 = 45
```

---

#### **문제 3: 배열 합계와 평균 - 정답**

```php
<?php
$scores = array(80, 85, 90, 75, 88);

// 합계 계산
$total = 0;
foreach ($scores as $score) {
    $total += $score;
}

// 평균 계산
$average = $total / count($scores);

echo "합계: " . $total . "점, 평균: " . $average . "점";

// 또는 내장 함수 사용
// $total = array_sum($scores);
// $average = $total / count($scores);
?>
```

**출력 결과:**

```
합계: 418점, 평균: 83.6점
```

---

#### **문제 4: 숫자 판정 함수 - 정답**

```php
<?php
/**
 * isEven 함수 - 짝수 여부 판정
 */
function isEven($num) {
    return $num % 2 == 0;
}

// 1부터 10까지 짝수 판정
for ($i = 1; $i <= 10; $i++) {
    if (isEven($i)) {
        echo $i . "는 짝수입니다<br>";
    }
}
?>
```

**출력 결과:**

```
2는 짝수입니다
4는 짝수입니다
6는 짝수입니다
8는 짝수입니다
10은 짝수입니다
```

---

#### **문제 5: 이메일 검증 함수 및 회원 처리 - 정답**

```php
<?php
/**
 * is_valid_email 함수 - 이메일 형식 검증
 */
function is_valid_email($email) {
    return strpos($email, '@') !== false;
}

// 회원 정보 배열
$members = array(
    array('name' => '홍길동', 'email' => 'hong@example.com'),
    array('name' => '김영희', 'email' => 'invalid-email'),
    array('name' => '이순신', 'email' => 'lee@domain.com')
);

// 회원 정보 검증 및 출력
echo "<h3>【 회원 이메일 검증 】</h3>";
foreach ($members as $member) {
    $name = $member['name'];
    $email = $member['email'];
  
    if (is_valid_email($email)) {
        echo $name . "(" . $email . ") - 유효함<br>";
    } else {
        echo $name . "(" . $email . ") - 유효하지 않음<br>";
    }
}
?>
```

**출력 결과:**

```
【 회원 이메일 검증 】
홍길동(hong@example.com) - 유효함
김영희(invalid-email) - 유효하지 않음
이순신(lee@domain.com) - 유효함
```

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **조건문 문제**: 조건을 차례로 확인하며 첫 번째 참인 조건을 찾기
2. **반복문 문제**: 초기값, 조건, 증감을 정확히 파악하기
3. **함수 문제**: 매개변수, 반환값, 스코프를 확인하기
4. **break/continue**: break는 반복 종료, continue는 현재 반복만 건너뛰기

### **실기작업형 풀이 전략**

1. **조건문**: if/elseif/else를 이용하여 다양한 경우 처리
2. **반복문**: for는 고정 횟수, foreach는 배열 순회에 적합
3. **함수**: 재사용 가능한 로직을 함수로 분리
4. **배열 합계**: foreach로 순회하며 += 연산자로 누적
5. **함수의 반환값**: return으로 결과를 반환받아 활용

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수([peterchokr@gmail.com](mailto:peterchokr@gmail.com)) 영남이공대학교

이 연습문제는 Claude 및 Gemini와 협업으로 제작되었습니다.
