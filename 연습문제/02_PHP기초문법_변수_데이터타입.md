# 📝 2장 연습문제: PHP 기초 문법 & 변수, 데이터 타입

---

## 🎯 객관식 10문제

#### **1번. PHP에서 echo와 print의 가장 큰 차이점은?**

① echo는 HTML만 출력하고 print는 PHP만 출력한다
② echo는 여러 인자를 쉼표로 구분하여 전달 가능하고, print는 하나만 가능하다
③ echo는 서버에서 실행되고 print는 브라우저에서 실행된다
④ print가 echo보다 훨씬 빠르다

---

#### **2번. 다음 중 PHP에서 올바른 변수명은?**

① `$2user`
② `$user-name`
③ `$user_name`
④ `$user name`

---

#### **3번. 다음 코드의 결과는?**

```php
$value = 10;
$value = "Hello";
$value = 3.14;
echo $value;
```

① 10
② "Hello"
③ 3.14
④ 오류 발생

---

#### **4번. PHP의 데이터 타입이 아닌 것은?**

① String
② Integer
③ Double
④ Record

---

#### **5번. var_dump() 함수의 역할은?**

① 변수를 삭제한다
② 변수의 타입과 값을 화면에 출력한다
③ 변수의 이름만 출력한다
④ 변수를 다른 파일로 전송한다

---

#### **6번. 상수(Constant)의 특징으로 올바른 것은?**

① 선언 후 값을 변경할 수 있다
② $를 붙여야 한다
③ 프로그램 실행 중 언제든지 재정의 가능하다
④ 한 번 정의되면 변경할 수 없다

---

#### **7번. isset() 함수의 역할은?**

① 변수의 값을 설정한다
② 변수가 정의되었는지 확인한다
③ 변수의 타입을 변경한다
④ 변수의 내용을 출력한다

---

#### **8번. 다음 코드의 출력 결과는?**

```php
$x = 10;
$y = "10";
echo $x == $y;  // ==는 값만 비교
```

① 10
② 10 (문자열)
③ 1 (true)
④ 0 (false)

---

#### **9번. 다음 타입 캐스팅 결과는?**

```php
$number = "123abc";
$int = (int)$number;
echo $int;
```

① 123
② 0
③ "123abc"
④ 오류 발생

---

#### **10번. 배열(Array)에 대한 설명 중 올바른 것은?**

① PHP 배열은 숫자 인덱스만 사용 가능하다
② 배열은 연관배열(키-값)과 인덱스 배열로 구분된다
③ 배열은 단일 데이터 타입만 포함할 수 있다
④ 배열을 echo로 직접 출력하면 전체 내용이 표시된다

---

## 💻 실기작업형 5문제

### **문제 1: 변수 선언과 출력**

**요구사항:**

- 이름, 나이, 키를 변수에 저장
- 각 변수의 타입을 gettype() 함수로 확인
- 다음 형식으로 출력: "홍길동은 25세이고, 키는 180.5cm입니다"

**파일명**: `variables.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 2: 데이터 타입 확인 (var_dump)**

**요구사항:**

- 다양한 데이터 타입의 변수 5개 생성 (String, Integer, Float, Boolean, Array)
- 각 변수를 var_dump()로 출력
- 각 변수의 타입을 명확하게 확인할 수 있도록

**파일명**: `datatypes.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 3: 상수와 변수 활용**

**요구사항:**

- 상수 3개 정의 (회사명, 웹사이트, 최대 파일 크기)
- 변수 3개 생성 (사용자명, 로그인 여부, 가입일)
- 상수와 변수를 이용해 사용자 정보 출력 (표 형식)

**파일명**: `constants_variables.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 4: 문자열 연결과 간단한 계산**

**요구사항:**

- 상품명, 가격, 수량 변수 저장
- 총액 계산 (가격 × 수량)
- 다음 형식으로 출력: "상품: 노트북, 가격: 1000000원, 수량: 2개, 총액: 2000000원"

**파일명**: `calculator.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: 배열 조작과 반복**

**요구사항:**

- 학생 3명의 이름과 점수를 배열에 저장 (연관배열)
  - 홍길동: 85점
  - 김영희: 92점
  - 이순신: 78점
- 배열의 값들을 foreach로 순회하며 출력
- "홍길동의 점수: 85점" 형식으로 출력

**파일명**: `array_loop.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

---

## ✅ 정답 및 풀이

### **객관식 정답**

| 문제 | 정답                                                                                                      | 풀이                                                                                                        |
| ---- | --------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------- |
| 1번  | **② echo는 여러 인자, print는 하나**                                                               | echo는 `echo "a", "b", "c"`로 여러 인자 전달 가능하지만, print는 `print "test"` 형식으로만 가능합니다   |
| 2번  | **③$user_name** | 변수명은 $로 시작하고 영문, 숫자, 언더스코어만 사용 가능합니다 (첫 글자는 숫자 불가) |                                                                                                             |
| 3번  | **③ 3.14**                                                                                         | PHP는 동적 타입 언어로, 변수의 타입을 자유롭게 변경할 수 있습니다. 마지막 할당값인 3.14가 출력됩니다        |
| 4번  | **④ Record**                                                                                       | PHP의 기본 데이터 타입: String, Integer, Float(Double), Boolean, Array, Object, NULL (Record는 없음)        |
| 5번  | **② 변수의 타입과 값을 화면에 출력**                                                               | var_dump()는 변수의 데이터 타입과 값을 상세히 표시합니다                                                    |
| 6번  | **④ 한 번 정의되면 변경할 수 없다**                                                                | 상수는 define()으로 정의 후 변경 불가능하며, define의 4번째 인자를 true로 하지 않으면 재정의도 불가능합니다 |
| 7번  | **② 변수가 정의되었는지 확인한다**                                                                 | isset()은 변수가 존재하는지, NULL이 아닌지 확인하는 함수입니다                                              |
| 8번  | **③ 1 (true)**                                                                                     | ==는 값만 비교하므로, 10과 "10"은 같은 값으로 간주되어 true(1)를 반환합니다                                 |
| 9번  | **① 123**                                                                                          | (int)로 타입 캐스팅하면 문자열의 앞부분에 있는 숫자만 정수로 변환됩니다 ("123abc" → 123)                   |
| 10번 | **② 배열은 연관배열(키-값)과 인덱스 배열로 구분된다**                                              | PHP 배열은 인덱스 배열과 연관배열 두 가지 형태를 모두 지원합니다                                            |

---

### **실기작업형 풀이**

#### **문제 1: 변수 선언과 출력 - 정답**

```php
<?php
// 변수 선언
$name = "홍길동";
$age = 25;
$height = 180.5;

// 타입 확인
$name_type = gettype($name);        // string
$age_type = gettype($age);          // integer
$height_type = gettype($height);    // double

// 출력
echo $name . "은 " . $age . "세이고, 키는 " . $height . "cm입니다<br>";
echo "타입: " . $name_type . ", " . $age_type . ", " . $height_type;
?>
```

**출력 결과:**

```
홍길동은 25세이고, 키는 180.5cm입니다
타입: string, integer, double
```

---

#### **문제 2: 데이터 타입 확인 (var_dump) - 정답**

```php
<?php
// 다양한 데이터 타입 변수 선언
$name = "홍길동";           // String
$age = 25;                 // Integer
$height = 180.5;           // Float
$is_student = true;        // Boolean
$skills = array("PHP", "MySQL", "JavaScript");  // Array

// var_dump()로 각 변수 출력
echo "1️⃣ 문자열(String):<br>";
var_dump($name);

echo "<br>2️⃣ 정수(Integer):<br>";
var_dump($age);

echo "<br>3️⃣ 실수(Float):<br>";
var_dump($height);

echo "<br>4️⃣ 불린(Boolean):<br>";
var_dump($is_student);

echo "<br>5️⃣ 배열(Array):<br>";
var_dump($skills);
?>
```

**출력 결과:**

```
1️⃣ 문자열(String):
string(12) "홍길동"

2️⃣ 정수(Integer):
int(25)

3️⃣ 실수(Float):
float(180.5)

4️⃣ 불린(Boolean):
bool(true)

5️⃣ 배열(Array):
array(3) { [0]=> string(3) "PHP" [1]=> string(5) "MySQL" [2]=> string(10) "JavaScript" }
```

---

#### **문제 3: 상수와 변수 활용 - 정답**

```php
<?php
// 상수 정의
define('COMPANY_NAME', '영남이공대학교');
define('WEBSITE', 'https://www.yc.ac.kr');
define('MAX_FILE_SIZE', 10485760);  // 10MB

// 변수 선언
$user_name = "홍길동";
$is_logged_in = true;
$signup_date = "2024-01-15";

?>

<!DOCTYPE html>
<html>
<head>
    <title>회사 정보와 사용자</title>
    <style>
        body { font-family: '맑은 고딕', sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: navy; color: white; }
    </style>
</head>
<body>

<h1>📋 회사 정보 (상수)</h1>
<table>
    <tr>
        <th>항목</th>
        <th>값</th>
    </tr>
    <tr>
        <td>회사명</td>
        <td><?php echo COMPANY_NAME; ?></td>
    </tr>
    <tr>
        <td>웹사이트</td>
        <td><?php echo WEBSITE; ?></td>
    </tr>
    <tr>
        <td>최대 파일 크기</td>
        <td><?php echo MAX_FILE_SIZE . " bytes"; ?></td>
    </tr>
</table>

<h1>👤 사용자 정보 (변수)</h1>
<table>
    <tr>
        <th>항목</th>
        <th>값</th>
    </tr>
    <tr>
        <td>사용자명</td>
        <td><?php echo $user_name; ?></td>
    </tr>
    <tr>
        <td>로그인 상태</td>
        <td><?php echo $is_logged_in ? "로그인됨" : "로그아웃"; ?></td>
    </tr>
    <tr>
        <td>가입일</td>
        <td><?php echo $signup_date; ?></td>
    </tr>
</table>

</body>
</html>
```

---

#### **문제 4: 문자열 연결과 간단한 계산 - 정답**

```php
<?php
// 상품 정보 변수
$product_name = "노트북";
$price = 1000000;
$quantity = 2;

// 총액 계산
$total_price = $price * $quantity;

// 결과 출력
echo "상품: " . $product_name . ", ";
echo "가격: " . $price . "원, ";
echo "수량: " . $quantity . "개, ";
echo "총액: " . $total_price . "원";

// 또는 printf 사용
echo "<br><br>";
printf("상품: %s, 가격: %d원, 수량: %d개, 총액: %d원", 
       $product_name, $price, $quantity, $total_price);
?>
```

**출력 결과:**

```
상품: 노트북, 가격: 1000000원, 수량: 2개, 총액: 2000000원

상품: 노트북, 가격: 1000000원, 수량: 2개, 총액: 2000000원
```

---

#### **문제 5: 배열 조작과 반복 - 정답**

```php
<?php
// 학생 점수 연관배열
$students = array(
    "홍길동" => 85,
    "김영희" => 92,
    "이순신" => 78
);

// 방법 1: foreach로 순회
echo "【 학생 성적 】<br>";
foreach ($students as $name => $score) {
    echo $name . "의 점수: " . $score . "점<br>";
}

echo "<br>【 합계 및 평균 】<br>";
// 총합 계산
$total_score = array_sum($students);
$average_score = $total_score / count($students);

echo "총합: " . $total_score . "점<br>";
printf("평균: %.2f점", $average_score);
?>
```

**출력 결과:**

```
【 학생 성적 】
홍길동의 점수: 85점
김영희의 점수: 92점
이순신의 점수: 78점

【 합계 및 평균 】
총합: 255점
평균: 85.00점
```

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **데이터 타입 문제**: PHP의 8가지 기본 타입을 확실히 알아두기 (String, Integer, Float, Boolean, Array, Object, NULL, Resource)
2. **echo vs print**: 여러 인자 가능 여부가 핵심 (echo ○, print ×)
3. **변수명 규칙**: $로 시작, 영문/숫자/_ 사용 가능 (첫 글자는 숫자 불가)
4. **타입 캐스팅**: (int), (string), (bool), (array) 등으로 타입 변환

### **실기작업형 풀이 전략**

1. **변수 먼저**: 필요한 모든 변수를 먼저 선언하고 초기화
2. **타입 확인**: var_dump(), gettype()으로 데이터 타입 검증
3. **문자열 연결**: `.` 연산자로 문자열 결합
4. **배열**: 인덱스 배열 `[]`과 연관배열 `["키" => "값"]` 구분
5. **반복**: foreach로 배열 순회할 때 `as $key => $value` 사용

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수([peterchokr@gmail.com](mailto:peterchokr@gmail.com)) 영남이공대학교

이 연습문제는 Claude 및 Gemini와 협업으로 제작되었습니다.
