# 5장: 폼 처리 & GET/POST 요청

---

## 학습목표

**학습목표**: 사용자 입력을 받고 기본적으로 검증하여 안전하게 처리할 수 있음

이 장을 학습하고 나면 다음을 할 수 있습니다:

✅ HTML form 태그로 사용자 입력 폼을 만들 수 있습니다.
✅ GET과 POST의 차이를 이해하고 올바르게 사용할 수 있습니다.
✅ PHP에서 $_POST, $_GET으로 폼 데이터를 받을 수 있습니다.
✅ 사용자 입력을 검증할 수 있습니다.
✅ 데이터를 안전하게 처리하여 출력할 수 있습니다.

---

## 1️⃣ 폼 기초 복습

### 1-1 HTML Form이란?

**폼(form)?** 사용자가 데이터를 입력하고 서버로 전송하는 방식입니다.

```html
<!-- 가장 기본적인 폼 -->
<form method="POST" action="process.php">
    <!-- 입력 필드들 -->
    <input type="text" name="username">
    
    <!-- 전송 버튼 -->
    <button type="submit">전송</button>
</form>

<!-- 중요 속성:
     method: 데이터 전송 방식 (GET 또는 POST)
     action: 데이터를 처리할 PHP 파일
     name: PHP에서 데이터를 받을 때 사용하는 이름
-->
```

### 1-2 주요 입력 요소들

```html
<!-- 텍스트 입력 -->
<input type="text" name="username" placeholder="사용자명">

<!-- 비밀번호 입력 (화면에 안 보임) -->
<input type="password" name="password" placeholder="비밀번호">

<!-- 이메일 입력 -->
<input type="email" name="email" placeholder="이메일">

<!-- 숫자 입력 -->
<input type="number" name="age" placeholder="나이" min="0" max="150">

<!-- 여러 줄 텍스트 -->
<textarea name="comment" rows="4" cols="50"></textarea>

<!-- 드롭다운 선택 -->
<select name="subject">
    <option value="math">수학</option>
    <option value="english">영어</option>
    <option value="korean">국어</option>
</select>

<!-- 체크박스 (여러 개 선택 가능) -->
<input type="checkbox" name="hobby" value="reading"> 독서
<input type="checkbox" name="hobby" value="gaming"> 게임

<!-- 라디오 버튼 (하나만 선택) -->
<input type="radio" name="gender" value="male"> 남성
<input type="radio" name="gender" value="female"> 여성
```

---

## 2️⃣ GET vs POST

### 2-1 GET 방식

**특징:**
- 데이터가 URL에 표시됨
- 용도: 데이터 조회 (검색, 필터링)
- 보안: 낮음 (암호는 전송 금지)

```html
<form method="GET" action="search.php">
    <input type="text" name="keyword">
    <button type="submit">검색</button>
</form>
```

**PHP에서 받기:**
```php
<?php
// URL: search.php?keyword=홍길동
$keyword = $_GET['keyword'];
echo "검색어: " . $keyword;
?>
```

### 2-2 POST 방식

**특징:**
- 데이터가 URL에 표시 안 됨
- 용도: 데이터 전송 (가입, 로그인, 수정)
- 보안: 높음 (권장)

```html
<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="사용자명">
    <input type="password" name="password" placeholder="비밀번호">
    <button type="submit">로그인</button>
</form>
```

**PHP에서 받기:**
```php
<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password) {
    echo "로그인 시도: " . $username;
}
?>
```

### 2-3 GET vs POST 비교

| 항목 | GET | POST |
|------|-----|------|
| **데이터 표시** | URL에 표시 | 숨김 |
| **보안** | 낮음 | 높음 |
| **용도** | 조회 | 전송 |
| **데이터 크기** | 제한 있음 | 큼 |
| **캐시** | 캐시됨 | 캐시 안 됨 |

---

## 3️⃣ PHP 폼 처리

### 3-1 $_POST로 데이터 수신

```php
<?php

// 1단계: 폼이 제출되었는지 확인
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 2단계: 폼 데이터 수신
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    
    // 3단계: 데이터 처리
    echo "이름: " . $name . "<br>";
    echo "이메일: " . $email . "<br>";
    echo "나이: " . $age . "<br>";
}

?>
```

### 3-2 isset()와 empty() 함수

```php
<?php

// isset(): 변수가 존재하고 NULL이 아닌가?
if (isset($_POST['username'])) {
    echo "사용자명이 입력되었습니다";
}

// empty(): 변수가 비어있는가? (0, "", false 등)
if (empty($_POST['password'])) {
    echo "비밀번호를 입력하세요";
}

// 일반적인 패턴
if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
    !empty($_POST['username']) && 
    !empty($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "로그인 처리 중...";
}

?>
```

### 3-3 $_GET으로 데이터 수신

```php
<?php

// 검색 폼에서 GET 사용
if (isset($_GET['search'])) {
    $search_keyword = $_GET['search'];
    echo "검색어: " . $search_keyword;
}

// 필터링에 GET 사용
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    // 해당 카테고리의 상품 조회
}

?>
```

---

## 4️⃣ 기본 데이터 검증

### 4-1 필드 필수 확인

```php
<?php

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 이름 필수 확인
    if (empty($_POST['name'])) {
        $errors[] = "이름을 입력하세요";
    }
    
    // 이메일 필수 확인
    if (empty($_POST['email'])) {
        $errors[] = "이메일을 입력하세요";
    }
    
    // 오류가 없으면 진행
    if (count($errors) === 0) {
        echo "모든 필드가 입력되었습니다!";
    }
}

?>
```

### 4-2 문자열 길이 확인

```php
<?php

$username = $_POST['username'];

// 문자열 길이 확인
if (strlen($username) < 5) {
    echo "사용자명은 5자 이상이어야 합니다";
}

if (strlen($username) > 20) {
    echo "사용자명은 20자 이하여야 합니다";
}

?>
```

### 4-3 이메일 형식 확인

```php
<?php

$email = $_POST['email'];

// 간단한 이메일 검증
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "올바른 이메일 형식이 아닙니다";
}

?>
```

### 4-4 숫자 확인

```php
<?php

$age = $_POST['age'];

// 숫자인지 확인
if (!is_numeric($age)) {
    echo "나이는 숫자여야 합니다";
}

// 범위 확인
if ($age < 0 || $age > 150) {
    echo "나이는 0~150 사이여야 합니다";
}

?>
```

---

## 5️⃣ 데이터 안전성 처리

### 5-1 htmlspecialchars() 함수

**목적:** 사용자 입력을 HTML 태그로 해석되지 않도록 변환합니다.

```php
<?php

$user_input = "<script>alert('공격')</script>";

// ❌ 위험한 방법
echo $user_input;  // 스크립트 실행됨!

// ✅ 안전한 방법
echo htmlspecialchars($user_input);
// 결과: &lt;script&gt;alert('공격')&lt;/script&gt;

?>
```

### 5-2 안전한 출력 패턴

```php
<?php

// 데이터베이스에서 가져온 데이터 출력
$name = $student['name'];

// 항상 htmlspecialchars() 사용!
echo "이름: " . htmlspecialchars($name);

// HTML 폼에 값 표시할 때
?>

<input type="text" value="<?php echo htmlspecialchars($name); ?>">

<?php
// 테이블에 표시할 때
echo "<td>" . htmlspecialchars($name) . "</td>";

?>
```

---

## 6️⃣ 실습 예제

### 6-1 실습 예제: 학생 검색 폼

**파일명: `student_search.php`**

```php
<?php

// 데이터베이스 연결 (4장과 동일)
$host = 'localhost';
$dbname = 'test_db';
$user = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $password
    );
} catch (PDOException $e) {
    die("연결 실패: " . $e->getMessage());
}

$search_keyword = '';
$students = array();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 검색어 확인
    if (empty($_POST['keyword'])) {
        $error = "검색어를 입력하세요";
    } else {
        $search_keyword = htmlspecialchars($_POST['keyword']);
        
        // 안전한 검색 (Prepared Statement 사용)
        $sql = "SELECT * FROM students 
                WHERE name LIKE ? ORDER BY name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['%' . $search_keyword . '%']);
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>학생 검색</title>
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
        
        .search-box {
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #2196F3;
        }
        
        input, button {
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        button {
            background-color: navy;
            color: white;
            cursor: pointer;
        }
        
        .error {
            color: red;
            padding: 10px;
            margin: 10px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th {
            background-color: navy;
            color: white;
            padding: 10px;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📚 학생 검색</h1>
    
    <!-- 검색 폼 -->
    <div class="search-box">
        <form method="POST">
            <label>학생 이름으로 검색:</label>
            <input type="text" name="keyword" 
                   value="<?php echo htmlspecialchars($search_keyword); ?>"
                   placeholder="예: 홍길동">
            <button type="submit">검색</button>
        </form>
    </div>
    
    <!-- 오류 메시지 -->
    <?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <!-- 검색 결과 -->
    <?php if (count($students) > 0): ?>
    <p>검색 결과: <?php echo count($students); ?>명</p>
    <table>
        <thead>
            <tr>
                <th>이름</th>
                <th>이메일</th>
                <th>나이</th>
                <th>성적</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo $student['age']; ?></td>
                <td><?php echo $student['score']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p>검색 결과가 없습니다.</p>
    <?php endif; ?>
</div>

</body>
</html>
```

---

## 7️⃣ 주요 개념 정리

### 7-1 폼 처리 기본 패턴

```php
<?php

// 1단계: 폼 제출 확인
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 2단계: 데이터 검증
    $errors = array();
    
    if (empty($_POST['field1'])) {
        $errors[] = "필드1은 필수입니다";
    }
    
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "이메일 형식이 잘못되었습니다";
    }
    
    // 3단계: 검증 통과 시 처리
    if (count($errors) === 0) {
        $data1 = htmlspecialchars($_POST['field1']);
        $data2 = htmlspecialchars($_POST['field2']);
        
        // 데이터 처리 (저장, 수정, 삭제 등)
        echo "처리되었습니다";
    } else {
        // 오류 표시
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

?>
```

### 7-2 검증 함수 정리

```php
<?php

// 필드 확인
isset($_POST['field']);      // 필드가 존재하는가?
empty($_POST['field']);      // 필드가 비어있는가?

// 문자열 검증
strlen($str) >= 5;           // 최소 길이 확인
filter_var($email, FILTER_VALIDATE_EMAIL);  // 이메일 형식
is_numeric($age);            // 숫자인가?

// 출력 안전화
htmlspecialchars($data);     // HTML 특수문자 변환

?>
```

---

## ✅ 퀴즈/과제

#### **과제 1: GET과 POST 사용 구분**

다음 상황에서 GET과 POST 중 어떤 것을 사용할지 선택하세요:

1. 상품 검색 폼
2. 회원가입 폼
3. 필터링 (카테고리별 상품 보기)
4. 비밀번호 변경 폼
5. 페이지 번호 이동 (페이지네이션)

#### **과제 2: 검색 폼 확장**

실습 예제의 학생 검색 폼을 다음과 같이 확장하세요:

1. **단계 1: 기본 검색**
   - 이름으로 검색 (강의에서 학습)

2. **단계 2: 성적 검색 추가**
   - 성적이상값 입력 필드 추가
   - 예: "80점 이상인 학생 찾기"

3. **단계 3: 검증 추가**
   - 검색어가 3자 이상인지 확인
   - 성적이 0~100 사이인지 확인

4. **단계 4: 결과 표시**
   - 검색 조건을 화면에 표시
   - 검색 결과 개수 표시

---

## 📝 중요 포인트

### 항상 기억하기

✅ **폼 제출 확인**
- $_SERVER['REQUEST_METHOD'] === 'POST' 확인
- 불필요한 처리 방지

✅ **필드 검증**
- empty()로 필수 필드 확인
- strlen()으로 길이 확인
- filter_var()로 형식 확인

✅ **안전한 출력**
- 데이터 출력 시 항상 htmlspecialchars() 사용
- 사용자 입력에서 온 모든 데이터 변환

---

수고했습니다.

조정현 교수(peterchokr@gmail.com)
영남이공대학교

