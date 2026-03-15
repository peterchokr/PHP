# 2장: PHP 기초 문법 & 변수, 데이터 타입

---

## 학습목표

**학습목표**: PHP 문법의 기초를 이해하고 변수와 데이터 타입을 활용할 수 있음

이 장을 학습하고 나면 다음을 할 수 있습니다:

✅ PHP의 기본 문법과 규칙을 이해할 수 있습니다.
✅ 변수를 선언하고 사용할 수 있습니다.
✅ PHP의 주요 데이터 타입을 구분하고 사용할 수 있습니다.
✅ 상수를 정의하고 활용할 수 있습니다.
✅ 산술, 비교, 논리 연산자를 사용할 수 있습니다.
✅ 사용자 입력을 받아서 처리할 수 있습니다.
✅ 간단한 계산기 프로그램을 만들 수 있습니다.

---

## 1️⃣ PHP 기본 문법

### 1-1 PHP 태그와 출력

PHP 코드를 작성하는 가장 기본적인 방법입니다.

#### **PHP 태그**

```php
<?php
// PHP 코드 작성 영역
// 이 안의 모든 코드는 서버에서 실행됩니다

?>
```

**주목할 점:**

- `<?php`로 시작, `?>`로 끝남
- HTML 파일 내에서 PHP 코드 포함 가능
- 서버에서 실행되고 결과만 브라우저로 전송

#### **echo와 print의 차이**

```php
<?php

// ============================================
// 1️⃣ echo - 더 빠르고 여러 인자 가능
// ============================================

echo "Hello World<br>";
echo "Hello", " ", "World";  // 여러 인자 가능

// echo는 반환값이 없음 (void)
// echo는 세미콜론(;) 생략 가능 (권장하지 않음)

// ============================================
// 2️⃣ print - 더 느리지만 반환값 있음
// ============================================

print "Hello World";  // 한 번에 하나의 인자만

// print는 반환값이 1
$result = print "test";  // $result에 1이 저장됨

// print는 항상 세미콜론(;) 필요
// print "Hello", "World";  // ❌ 오류!

// ============================================
// 📝 결론: 실무에서는 echo를 주로 사용
// ============================================

?>
```

**실무 권장:**

- `echo` 사용: 더 빠르고 유연함
- `print` 사용: 특별한 경우만

#### **주석 (Comment)**

```php

<?php

// ============================================
// 한 줄 주석
// ============================================

// 이것은 한 줄 주석입니다
# 파이썬 스타일 주석도 가능합니다

// ============================================
// 여러 줄 주석
// ============================================

/*
이것은
여러 줄
주석입니다
*/

/* 한 줄도 가능합니다 */

// ============================================
// 주석 활용 팁
// ============================================

// ✅ 좋은 예: 코드의 의도를 설명
$user_age = 25;  // 사용자의 나이

// ❌ 나쁜 예: 명백한 코드를 설명
$x = 25;  // x를 25로 설정

// ✅ 좋은 예: 복잡한 로직을 설명
// 0보다 크고 100보다 작은 숫자만 필터링
$numbers = [-5, 10, 50, 100, 150];
$valid_numbers = array_filter($numbers, fn($n) => $n > 0 && $n < 100);
print_r($valid_numbers);
?>
```

#### **var_dump() - 변수 상세 정보**

```php
<?php

// ============================================
// var_dump() - 변수의 타입과 값을 화면에 출력
// ============================================

$number = 42;
var_dump($number);
// 결과: int(42)

$text = "Hello";
var_dump($text);
// 결과: string(5) "Hello"

$is_active = true;
var_dump($is_active);
// 결과: bool(true)

// ============================================
// 여러 변수 한 번에 출력
// ============================================

$name = "홍길동";
$age = 25;
$email = "hong@example.com";

var_dump($name, $age, $email);

// 결과:
// string(12) "홍길동"
// int(25)
// string(18) "hong@example.com"

?>
```

### 1-2 실습 예제: 기본 문법 이해하기

이제 배운 기본 문법을 실제로 사용해봅시다.

**파일명: `basic_syntax.php`**

```php
<?php
/**
 * basic_syntax.php - PHP 기본 문법 실습
 * 
 * 역할:
 * 1. PHP 태그 사용 확인
 * 2. echo, print 비교
 * 3. 주석 작성 방법
 * 4. var_dump() 활용
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP 기본 문법</title>
    <style>
        body {
            font-family: '맑은 고딕', sans-serif;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }
  
        .container {
            background: white;
            padding: 30px;
            border: 1px solid #ddd;
        }
  
        h1 {
            color: navy;
        }
  
        .section {
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #2196F3;
        }
  
        .section h2 {
            margin-top: 0;
            color: #2196F3;
        }
  
        .code-output {
            background-color: #f0f0f0;
            padding: 10px;
            font-family: monospace;
            font-size: 14px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📝 PHP 기본 문법</h1>
  
    <!-- echo 사용 -->
    <div class="section">
        <h2>1️⃣ echo 사용</h2>
        <?php
        echo "echo로 출력된 텍스트입니다<br>";
        echo "이것은 ", "여러 인자로 ", "출력됩니다<br>";
        ?>
    </div>
  
    <!-- print 사용 -->
    <div class="section">
        <h2>2️⃣ print 사용</h2>
        <?php
        print "print로 출력된 텍스트입니다<br>";
        ?>
    </div>
  
    <!-- 변수 출력 -->
    <div class="section">
        <h2>3️⃣ 변수 출력</h2>
        <?php
        $title = "PHP 학습";
        $version = 8.0;
        $is_fun = true;
  
        echo "제목: " . $title . "<br>";
        echo "버전: " . $version . "<br>";
        echo "재미있나요? " . ($is_fun ? "네!" : "아니오") . "<br>";
        ?>
    </div>
  
    <!-- var_dump 사용 -->
    <div class="section">
        <h2>4️⃣ var_dump() - 변수 상세 정보</h2>
        <p>변수의 타입과 값을 확인할 수 있습니다:</p>
        <div class="code-output">
            <?php
            $age = 25;
            $name = "홍길동";
            $height = 180.5;
            $is_student = true;
    
            var_dump($age);
            var_dump($name);
            var_dump($height);
            var_dump($is_student);
            ?>
        </div>
    </div>
</div>

</body>
</html>
```

**이 파일을 `http://localhost/basic_syntax.php`로 실행하면:**

- echo와 print의 사용 방법 확인
- 변수 출력 방식 이해
- var_dump()로 변수의 타입 확인 ✅

---

## 2️⃣ 변수와 상수

### 2-1 변수 선언 규칙

PHP에서 변수를 올바르게 사용하는 방법입니다.

#### **변수 선언의 규칙**

```php
<?php

// ============================================
// 변수 선언 규칙
// ============================================

// ✅ 올바른 예
$name = "홍길동";          // 문자열
$age = 25;                // 정수
$height = 180.5;          // 실수
$is_student = true;       // 불린

$_name = "김영희";         // 언더스코어 시작 가능
$name2 = "이순신";         // 숫자 포함 가능 (단, 첫 글자는 불가)

// ❌ 틀린 예
// $2name = "강감찬";        // ❌ 숫자로 시작 불가
// $my-name = "세종";        // ❌ 하이픈(-) 사용 불가
// $my name = "이황";        // ❌ 공백 사용 불가

// ============================================
// 변수 명명 규칙 (권장)
// ============================================

// camelCase (카멜케이스): 주로 클래스 메서드
$userName = "홍길동";
$userAge = 25;

// snake_case (스네이크 케이스): PHP 권장
$user_name = "홍길동";
$user_age = 25;

// CONSTANT_STYLE: 상수
define('MAX_AGE', 100);

// ============================================
// 변수명은 의미 있게
// ============================================

// ✅ 좋은 예
$user_email = "hong@example.com";
$total_price = 50000;

// ❌ 나쁜 예
$x = "hong@example.com";
$a = 50000;

?>
```

#### **동적 타입 시스템**

```php
<?php

// ============================================
// PHP는 동적 타입 언어
// 변수의 타입이 런타임에 결정됨
// ============================================

$value = 10;           // 정수
var_dump($value);      // int(10)

$value = "Hello";      // 문자열로 변경
var_dump($value);      // string(5) "Hello"

$value = 3.14;         // 실수로 변경
var_dump($value);      // float(3.14)

$value = true;         // 불린으로 변경
var_dump($value);      // bool(true)

// ============================================
// 변수 존재 확인
// ============================================

if (isset($user_name)) {
    echo "변수가 정의되었습니다<br>";
} else {
    echo "변수가 정의되지 않았습니다<br>";
}

// ============================================
// 변수 초기화 및 값 리셋
// ============================================

$temp = "임시 데이터";
var_dump($temp);  // string(16) "임시 데이터"

unset($temp);     // 변수 삭제
var_dump($temp);  // ❌ Warning: Undefined variable

?>
```

#### **상수 (Constant) 정의**

```php
<?php

// ============================================
// 상수 정의: define() 함수
// ============================================

define('SITE_NAME', '나의 쇼핑몰');
define('SITE_URL', 'https://myshop.com');
define('MAX_FILE_SIZE', 10485760);  // 10MB

echo SITE_NAME . "<br>";      // 나의 쇼핑몰
echo SITE_URL . "<br>";       // https://myshop.com
echo MAX_FILE_SIZE . "<br>";  // 10485760

// ============================================
// 상수의 특징
// ============================================

// ✅ $ 기호 사용 안 함
echo SITE_NAME;       // ✅ 가능

// ✅ 재정의 불가 (define의 3번째 인자가 false일 때)
define('FIXED_VALUE', 100, false);
// FIXED_VALUE = 200;  // ❌ 오류!

// ============================================
// const로도 상수 정의 가능
// ============================================

const APP_VERSION = '2.0.1';
const DATABASE = 'mydb';

echo APP_VERSION . "<br>";  // 2.0.1
echo DATABASE . "<br>";     // mydb

// ============================================
// define() vs const 비교
// ============================================

/*
define()
- 런타임에 정의 가능
- 함수 내에서도 정의 가능
- 3번째 인자로 대소문자 구분 설정

const
- 컴파일 시점에 정의
- 클래스 상수로 사용 가능
- 대소문자 항상 구분
*/

?>
```

### 2-2 실습 예제: 변수와 상수 활용

**파일명: `variables_constants.php`**

```php
<?php
/**
 * variables_constants.php - 변수와 상수 실습
 * 
 * 역할:
 * 1. 변수 선언 및 사용
 * 2. 동적 타입 확인
 * 3. 상수 정의 및 사용
 */

// ============================================
// 상수 정의
// ============================================

define('SCHOOL_NAME', '영남이공대학교');
define('DEPARTMENT', 'AI소프트웨어학과');
const COURSE_CODE = 'CS201';

?>

<!DOCTYPE html>
<html>
<head>
    <title>변수와 상수</title>
    <style>
        body {
            font-family: '맑은 고딕', sans-serif;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }
  
        .container {
            background: white;
            padding: 30px;
            border: 1px solid #ddd;
        }
  
        h1 {
            color: navy;
        }
  
        .info-box {
            margin: 20px 0;
            padding: 15px;
            background-color: #e3f2fd;
            border-left: 4px solid #2196F3;
        }
  
        .info-box h2 {
            margin-top: 0;
            color: #1976D2;
        }
  
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
  
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
  
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📋 변수와 상수 관리</h1>
  
    <!-- 상수 정보 -->
    <div class="info-box">
        <h2>1️⃣ 학교 정보 (상수)</h2>
        <table>
            <tr>
                <th>항목</th>
                <th>값</th>
            </tr>
            <tr>
                <td>학교명</td>
                <td><?php echo SCHOOL_NAME; ?></td>
            </tr>
            <tr>
                <td>계열</td>
                <td><?php echo DEPARTMENT; ?></td>
            </tr>
            <tr>
                <td>과정코드</td>
                <td><?php echo COURSE_CODE; ?></td>
            </tr>
        </table>
    </div>
  
    <!-- 학생 정보 (변수) -->
    <div class="info-box">
        <h2>2️⃣ 학생 정보 (변수)</h2>
        <?php
        // 학생 정보 변수
        $student_name = "홍길동";
        $student_id = 2024001;
        $student_age = 20;
        $gpa = 3.85;
        $is_honor_student = true;
  
        ?>
        <table>
            <tr>
                <th>항목</th>
                <th>값</th>
                <th>타입</th>
            </tr>
            <tr>
                <td>이름</td>
                <td><?php echo $student_name; ?></td>
                <td><?php echo gettype($student_name); ?></td>
            </tr>
            <tr>
                <td>학번</td>
                <td><?php echo $student_id; ?></td>
                <td><?php echo gettype($student_id); ?></td>
            </tr>
            <tr>
                <td>나이</td>
                <td><?php echo $student_age; ?></td>
                <td><?php echo gettype($student_age); ?></td>
            </tr>
            <tr>
                <td>학점</td>
                <td><?php echo $gpa; ?></td>
                <td><?php echo gettype($gpa); ?></td>
            </tr>
            <tr>
                <td>우등생</td>
                <td><?php echo $is_honor_student ? "예" : "아니오"; ?></td>
                <td><?php echo gettype($is_honor_student); ?></td>
            </tr>
        </table>
    </div>
  
    <!-- 동적 타입 변경 -->
    <div class="info-box">
        <h2>3️⃣ 동적 타입 변경</h2>
        <p>같은 변수를 다양한 타입으로 사용할 수 있습니다:</p>
        <?php
        $flexible = 100;
        echo "초기값: " . $flexible . " (타입: " . gettype($flexible) . ")<br>";
  
        $flexible = "Hello";
        echo "변경: " . $flexible . " (타입: " . gettype($flexible) . ")<br>";
  
        $flexible = 3.14;
        echo "변경: " . $flexible . " (타입: " . gettype($flexible) . ")<br>";
  
        $flexible = true;
        echo "변경: " . $flexible . " (타입: " . gettype($flexible) . ")<br>";
        ?>
    </div>
</div>

</body>
</html>
```

---

## 3️⃣ 데이터 타입

### 3-1 주요 데이터 타입

PHP에서 제공하는 모든 데이터 타입을 학습합니다.

#### **String (문자열)**

```php
<?php

// ============================================
// 1️⃣ String - 문자 및 문자열 데이터
// ============================================

// 큰따옴표로 선언
$name = "홍길동";
$message = "안녕하세요";

// 작은따옴표로 선언
$city = 'Seoul';
$country = 'Korea';

// 큰따옴표: 변수 치환 가능
$age = 25;
$text1 = "나이: $age";  // 나이: 25

// 작은따옴표: 변수 치환 불가
$text2 = '나이: $age';  // 나이: $age

// ============================================
// 문자열 연결
// ============================================

$first_name = "홍";
$last_name = "길동";
$full_name = $first_name . $last_name;  // 홍길동

// 문자열 길이 (strlen 함수)
$message = "Hello World";
$length = strlen($message);  // 11

?>
```

#### **Integer (정수)**

```php
<?php

// ============================================
// 2️⃣ Integer - 정수 데이터
// ============================================

// 양수
$positive = 100;
$zero = 0;
$negative = -50;

// 진수 표현
$decimal = 255;      // 10진법
$octal = 0377;       // 8진법
$hex = 0xFF;         // 16진법

// 정수형 범위 확인
var_dump(PHP_INT_MAX);    // 최댓값
var_dump(PHP_INT_MIN);    // 최솟값
var_dump(PHP_INT_SIZE);   // 바이트 크기

// ============================================
// 정수 판별
// ============================================

$num = 42;
if (is_int($num)) {
    echo "정수입니다<br>";
}

?>
```

#### **Float (실수)**

```php
<?php

// ============================================
// 3️⃣ Float - 실수(소수점) 데이터
// ============================================

$price = 29.99;
$pi = 3.14159;
$temperature = -15.5;

// 과학 표기법
$large = 1.2e3;      // 1200
$small = 1.2e-3;     // 0.0012

// ============================================
// 실수 판별
// ============================================

$value = 3.14;
if (is_float($value)) {
    echo "실수입니다<br>";
}

?>
```

#### **Boolean (불린)**

```php
<?php

// ============================================
// 4️⃣ Boolean - 참(true) 또는 거짓(false)
// ============================================

$is_active = true;
$is_deleted = false;

// 조건문에서 자주 사용
if ($is_active) {
    echo "활성화되었습니다<br>";
}

// ============================================
// 불린으로 변환되는 값들
// ============================================

// false로 간주되는 값
$zero = 0;
$zero_float = 0.0;
$empty_string = "";
$string_zero = "0";
$null_value = null;
$empty_array = array();

if (!$zero) {
    echo "0은 false로 간주됩니다<br>";
}

// true로 간주되는 값
$one = 1;
$text = "hello";
$non_empty_array = array(1, 2, 3);

if ($one) {
    echo "1은 true로 간주됩니다<br>";
}

?>
```

#### **Array (배열)**

```php
<?php

// ============================================
// 5️⃣ Array - 여러 값을 저장하는 자료구조
// ============================================

// 인덱스 배열 (순번으로 접근)
$fruits = array("사과", "바나나", "오렌지");
$fruits = ["사과", "바나나", "오렌지"];  // 단축 문법

echo $fruits[0];  // 사과
echo $fruits[1];  // 바나나

// 연관 배열 (키-값으로 접근)
$student = array(
    "name" => "홍길동",
    "age" => 25,
    "email" => "hong@example.com"
);

echo $student["name"];   // 홍길동
echo $student["age"];    // 25

// ============================================
// 배열의 길이
// ============================================

$numbers = [10, 20, 30, 40];
$count = count($numbers);  // 4

// ============================================
// 배열 순회 (반복문)
// ============================================

// foreach를 사용한 순회
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

// 키와 값을 모두 사용
foreach ($student as $key => $value) {
    echo "$key: $value<br>";
}

?>
```

#### **NULL (빈 값)**

```php
<?php

// ============================================
// 6️⃣ NULL - 값이 없음을 나타냄
// ============================================

$undefined = null;
$empty_var = null;

// 변수 초기화
$result = null;
if ($some_condition) {
    $result = "값";
}

// null 확인
if (is_null($result)) {
    echo "값이 없습니다<br>";
}

// isset으로도 확인 가능
if (!isset($result)) {
    echo "변수가 정의되지 않았거나 null입니다<br>";
}

?>
```

### 3-2 타입 확인 및 변환

```php
<?php
// ============================================
// gettype() - 변수의 타입 확인
// ============================================

$value = 42;
echo gettype($value)."<br>";   // integer

$value = "hello";
echo gettype($value)."<br>";   // string

$value = 3.14;
echo gettype($value)."<br>";   // double

$value = true;
echo gettype($value)."<br>";   // boolean

// ============================================
// is_*() 함수들 - 타입 판별
// ============================================

$number = 100;
is_int($number);        // true
is_float($number);      // false
is_string($number);     // false
is_bool($number);       // false
is_array($number);      // false
is_null($number);       // false

// ============================================
// settype() - 타입 변환
// ============================================

$value = "123";
settype($value, "integer");
echo gettype($value)."<br>";   // integer
echo $value;            // 123

// ============================================
// 캐스팅 - 명시적 타입 변환
// ============================================

$string_number = "456";
$number = (int)$string_number;      // 456 (integer)

$price = 29.99;
$integer_price = (int)$price;       // 29 (정수부만)

$value = 1;
$string = (string)$value;           // "1" (string)

$array = (array)"hello";            // Array (배열로 변환)
?>
```

### 3-3 실습 예제: 데이터 타입 관리 프로그램

**파일명: `data_types.php`**

```php
<?php
/**
 * data_types.php - 데이터 타입 실습
 * 
 * 역할:
 * 1. 모든 데이터 타입 선언
 * 2. 타입 확인
 * 3. 타입 변환
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>데이터 타입 관리</title>
    <style>
        body {
            font-family: '맑은 고딕', sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
        }
  
        .container {
            background: white;
            padding: 30px;
            border: 1px solid #ddd;
        }
  
        h1 {
            color: navy;
        }
  
        .type-group {
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #2196F3;
        }
  
        .type-group h2 {
            color: #2196F3;
            margin-top: 0;
        }
  
        .data-row {
            display: flex;
            margin: 10px 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #eee;
        }
  
        .data-label {
            flex: 1;
            font-weight: bold;
            color: #333;
        }
  
        .data-value {
            flex: 2;
            color: #666;
        }
  
        .data-type {
            flex: 1;
            color: #2196F3;
            font-family: monospace;
        }
  
        .code-output {
            background-color: #f0f0f0;
            padding: 10px;
            font-family: monospace;
            font-size: 13px;
            white-space: pre;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🔍 데이터 타입 관리</h1>
  
    <?php
    // ============================================
    // 모든 데이터 타입 정의
    // ============================================
  
    // String
    $username = "홍길동";
  
    // Integer
    $user_id = 2024001;
  
    // Float
    $gpa = 3.85;
  
    // Boolean
    $is_active = true;
  
    // Array (인덱스)
    $courses = ["PHP", "MySQL", "JavaScript"];
  
    // Array (연관)
    $student = [
        "name" => "홍길동",
        "age" => 20,
        "major" => "AI소프트웨어"
    ];
  
    // NULL
    $optional_field = null;
  
    ?>
  
    <!-- String 타입 -->
    <div class="type-group">
        <h2>1️⃣ String (문자열)</h2>
        <div class="data-row">
            <div class="data-label">변수</div>
            <div class="data-value"><?php echo $username; ?></div>
            <div class="data-type"><?php echo gettype($username); ?></div>
        </div>
        <div class="data-row">
            <div class="data-label">길이</div>
            <div class="data-value"><?php echo strlen($username) . " 글자"; ?></div>
            <div class="data-type"></div>
        </div>
    </div>
  
    <!-- Integer 타입 -->
    <div class="type-group">
        <h2>2️⃣ Integer (정수)</h2>
        <div class="data-row">
            <div class="data-label">변수</div>
            <div class="data-value"><?php echo $user_id; ?></div>
            <div class="data-type"><?php echo gettype($user_id); ?></div>
        </div>
        <div class="data-row">
            <div class="data-label">정수 판별</div>
            <div class="data-value"><?php echo is_int($user_id) ? "네" : "아니오"; ?></div>
            <div class="data-type"></div>
        </div>
    </div>
  
    <!-- Float 타입 -->
    <div class="type-group">
        <h2>3️⃣ Float (실수)</h2>
        <div class="data-row">
            <div class="data-label">변수</div>
            <div class="data-value"><?php echo $gpa; ?></div>
            <div class="data-type"><?php echo gettype($gpa); ?></div>
        </div>
        <div class="data-row">
            <div class="data-label">실수 판별</div>
            <div class="data-value"><?php echo is_float($gpa) ? "네" : "아니오"; ?></div>
            <div class="data-type"></div>
        </div>
    </div>
  
    <!-- Boolean 타입 -->
    <div class="type-group">
        <h2>4️⃣ Boolean (불린)</h2>
        <div class="data-row">
            <div class="data-label">변수</div>
            <div class="data-value"><?php echo $is_active ? "true (활성)" : "false (비활성)"; ?></div>
            <div class="data-type"><?php echo gettype($is_active); ?></div>
        </div>
    </div>
  
    <!-- Array 타입 -->
    <div class="type-group">
        <h2>5️⃣ Array (배열) - 인덱스</h2>
        <div class="data-row">
            <div class="data-label">배열</div>
            <div class="data-value">
                <?php
                foreach ($courses as $i => $course) {
                    echo "[" . $i . "] " . $course . "<br>";
                }
                ?>
            </div>
            <div class="data-type"><?php echo gettype($courses); ?></div>
        </div>
        <div class="data-row">
            <div class="data-label">원소 개수</div>
            <div class="data-value"><?php echo count($courses); ?></div>
            <div class="data-type"></div>
        </div>
    </div>
  
    <!-- Array 연관 -->
    <div class="type-group">
        <h2>6️⃣ Array (배열) - 연관</h2>
        <div class="data-row">
            <div class="data-label">배열</div>
            <div class="data-value">
                <?php
                foreach ($student as $key => $value) {
                    echo $key . ": " . $value . "<br>";
                }
                ?>
            </div>
            <div class="data-type"><?php echo gettype($student); ?></div>
        </div>
    </div>
  
    <!-- NULL 타입 -->
    <div class="type-group">
        <h2>7️⃣ NULL (빈 값)</h2>
        <div class="data-row">
            <div class="data-label">변수</div>
            <div class="data-value"><?php echo is_null($optional_field) ? "(null - 값 없음)" : $optional_field; ?></div>
            <div class="data-type"><?php echo gettype($optional_field); ?></div>
        </div>
    </div>
  
    <!-- 타입 변환 예제 -->
    <div class="type-group">
        <h2>🔄 타입 변환</h2>
        <div class="code-output">
<?php
$string_num = "123";
$converted = (int)$string_num;

echo "원본: " . $string_num . " (타입: " . gettype($string_num) . ")\n";
echo "변환: " . $converted . " (타입: " . gettype($converted) . ")\n";
echo "\n";

$price = 29.99;
$price_int = (int)$price;

echo "원본: " . $price . " (타입: " . gettype($price) . ")\n";
echo "변환: " . $price_int . " (타입: " . gettype($price_int) . ")\n";
?>
        </div>
    </div>
</div>

</body>
</html>
```

---

## 4️⃣ 연산자

### 4-1 산술 연산자

```php
<?php

// ============================================
// 산술 연산자
// ============================================

$a = 10;
$b = 3;

$sum = $a + $b;         // 더하기: 13
$difference = $a - $b;  // 빼기: 7
$product = $a * $b;     // 곱하기: 30
$quotient = $a / $b;    // 나누기: 3.3333...
$remainder = $a % $b;   // 나머지: 1
$power = $a ** $b;      // 거듭제곱: 1000

// ============================================
// 단축 연산자
// ============================================

$count = 10;
$count += 5;            // $count = $count + 5; (15)
$count -= 3;            // $count = $count - 3; (12)
$count *= 2;            // $count = $count * 2; (24)
$count /= 4;            // $count = $count / 4; (6)

// ============================================
// 증감 연산자
// ============================================

$x = 5;
$x++;                   // 6 (후위 증가)
++$x;                   // 7 (전위 증가)
$x--;                   // 6 (후위 감소)
--$x;                   // 5 (전위 감소)

// ============================================
// 전위와 후위의 차이
// ============================================

$value = 10;
$result1 = $value++;    // $result1 = 10, $value = 11
$result2 = ++$value;    // $result2 = 12, $value = 12

?>
```

### 4-2 비교 연산자

```php
<?php

// ============================================
// 비교 연산자
// ============================================

$a = 10;
$b = 20;

$a == $b;       // false (값 비교, 타입 무시)
$a === $b;      // false (값과 타입 비교)
$a != $b;       // true (값이 다름)
$a !== $b;      // true (값과 타입이 다름)
$a < $b;        // true (10 < 20)
$a > $b;        // false (10 > 20)
$a <= $b;       // true (10 <= 20)
$a >= $b;       // false (10 >= 20)

// ============================================
// == vs === (중요!)
// ============================================

"10" == 10;     // true (값만 비교)
"10" === 10;    // false (타입도 비교)

0 == false;     // true (값만 비교)
0 === false;    // false (타입도 비교)

null == "";     // true
null === "";    // false

// ✅ 권장: === 사용
if ($age === 20) {
    echo "정확히 20세입니다<br>";
}

?>
```

### 4-3 논리 연산자

```php
?php

// ============================================
// 논리 연산자
// ============================================

$age = 25;
$has_license = true;

// AND 연산 (모두 참이어야 참)
if ($age >= 18 && $has_license) {
    echo "운전 가능<br>";
}

// OR 연산 (하나라도 참이면 참)
$is_weekend = false;
$is_holiday = true;

if ($is_weekend || $is_holiday) {
    echo "휴무일<br>";
}

// NOT 연산 (참을 거짓으로, 거짓을 참으로)
$is_logged_in = false;

if (!$is_logged_in) {
    echo "로그인하세요<br>";
}

?>
```

### 4-4 문자열 연결 연산자

```php
<?php

// ============================================
// 문자열 연결 (.)
// ============================================

$first_name = "홍";
$last_name = "길동";
$full_name = $first_name . $last_name;  // 홍길동

// 변수와 문자열 섞기
$age = 25;
$message = "나이: " . $age . "세";  // 나이: 25세

// 문자열 연결 단축 (PHP 8+)
$text = "Hello";
$text .= " World";  // $text = $text . " World";
echo $text;         // Hello World

?>
```

---

## ✅ 퀴즈/과제

#### **과제 1: 데이터 타입 판별 프로그램**

다음을 구현하세요:

1. **다양한 데이터 타입 변수 선언**

   - String, Integer, Float, Boolean, Array, NULL
   - 각각 최소 2개 이상
2. **gettype() 함수로 타입 확인**

   - 모든 변수의 타입 출력
   - HTML 테이블로 정리
3. **타입 변환 실습**

   - 문자열을 정수로 변환
   - 정수를 문자열로 변환
   - 실수를 정수로 변환

---

수고했습니다.   
조정현 교수(peterchokr@gmail.com)     영남이공대학교

이 수업자료는 Claude와 Gemini를 이용하여 제작되었습니다.
