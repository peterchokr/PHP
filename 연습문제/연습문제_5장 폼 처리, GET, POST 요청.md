# 📝 5장 연습문제: 폼 처리 & GET/POST 요청

---

## 🎯 객관식 10문제

#### **1번. 폼에서 POST 방식과 GET 방식의 가장 큰 차이점은?**

① POST는 데이터가 URL에 표시되고, GET은 숨겨진다  
② GET은 데이터가 URL에 표시되고, POST는 숨겨진다  
③ POST는 데이터 크기 제한이 있고, GET은 없다  
④ GET은 보안이 높고, POST는 보안이 낮다

---

#### **2번. 회원가입 폼을 만들 때 POST와 GET 중 어느 것을 사용해야 한다?**

① GET (URL에 표시되어 확인하기 좋음)  
② POST (보안상 안전함)  
③ GET과 POST를 동시에 사용  
④ 상관없음 (둘 다 같은 기능)

---

#### **3번. 다음 코드에서 ?에 들어갈 것은?**

```php
if ($_SERVER['REQUEST_METHOD'] === ?) {
    $username = $_POST['username'];
    echo "로그인 시도";
}
```

① 'GET'  
② 'POST'  
③ 'SUBMIT'  
④ 'FORM'

---

#### **4번. isset()과 empty()의 차이점은?**

① isset()은 변수 존재 확인, empty()는 값이 비어있는지 확인  
② isset()은 값이 비어있는지 확인, empty()는 변수 존재 확인  
③ 둘 다 같은 역할을 한다  
④ isset()은 숫자만, empty()는 문자열만 확인

---

#### **5번. 다음 코드의 결과는?**

```php
$value = 0;

if (isset($value)) {
    echo "A";
}

if (!empty($value)) {
    echo "B";
}
```

① A만 출력  
② B만 출력  
③ AB 모두 출력  
④ 아무것도 출력 안 됨

---

#### **6번. 이메일 유효성을 검사하는 PHP 함수는?**

① is_numeric()  
② strlen()  
③ filter_var($email, FILTER_VALIDATE_EMAIL)  
④ htmlspecialchars()

---

#### **7번. htmlspecialchars()의 역할은?**

① 암호화  
② HTML 특수문자를 문자 엔티티로 변환 (HTML 태그 인젝션 방지)  
③ 문자열을 숫자로 변환  
④ 데이터베이스에 저장

---

#### **8번. 다음 코드의 결과는?**

```php
$name = "<script>alert('공격')</script>";

echo htmlspecialchars($name);
```

① &lt;script&gt;alert('공격')&lt;/script&gt; 출력  
② <script>alert('공격')</script> 출력  
③ 스크립트 실행  
④ 오류 발생

---

#### **9번. 사용자가 입력한 검색어로 데이터베이스를 검색할 때, 안전한 방법은?**

① `$sql = "SELECT * FROM students WHERE name = '" . $_GET['keyword'] . "'";`  
② `$sql = "SELECT * FROM students WHERE name LIKE ?";` (Prepared Statement)  
③ 검증 없이 바로 사용  
④ 특수문자를 모두 제거

---

#### **10번. 다음 HTML 폼 코드에서 ?에 들어갈 것은?**

```html
<form ? action="login.php">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">로그인</button>
</form>
```

① method="GET"  
② method="POST"  
③ method="SUBMIT"  
④ type="form"

---

## 💻 실기작업형 5문제

### **문제 1: 간단한 로그인 폼 (POST 사용)**

**요구사항:**
- HTML 폼 작성 (method="POST", action="login_process.php")
- 아이디 입력 필드 (name="username")
- 비밀번호 입력 필드 (name="password")
- 로그인 버튼
- POST로 받은 데이터 처리 및 출력

**파일명**: `login_form.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 2: 검색 폼 (GET 사용)**

**요구사항:**
- HTML 폼 작성 (method="GET", action="search.php")
- 검색어 입력 필드 (name="keyword")
- 검색 버튼
- GET으로 받은 검색어를 화면에 출력
- 형식: "검색어: 홍길동"

**파일명**: `search_form.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 3: 이메일 검증이 포함된 회원가입 폼**

**요구사항:**
- HTML 폼 작성 (method="POST", name="username", name="email")
- 아이디 입력 필드
- 이메일 입력 필드
- 회원가입 버튼
- POST 데이터 수신 및 검증:
  - 아이디와 이메일이 필수인지 확인
  - 이메일 형식이 올바른지 확인
  - 검증 통과 시: "가입 완료"
  - 검증 실패 시: 오류 메시지 출력

**파일명**: `signup_form.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 4: 입력 데이터 검증 (길이 제한)**

**요구사항:**
- HTML 폼 작성 (아이디, 비밀번호 입력)
- 아이디: 5자 이상 20자 이하
- 비밀번호: 6자 이상
- 검증 로직:
  - strlen() 함수로 길이 확인
  - 검증 실패 시 오류 메시지 배열에 저장
  - 모든 오류 메시지를 화면에 출력

**파일명**: `validation_form.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: 폼 데이터 처리 및 안전한 출력**

**요구사항:**
- HTML 폼 (POST): 사용자 정보 입력 (이름, 전공, 소개)
- 폼 제출 확인 ($_SERVER['REQUEST_METHOD'] === 'POST')
- htmlspecialchars()로 모든 입력값 안전 처리
- 입력된 데이터를 포함한 HTML 테이블로 표시
- 폼 제출 전에는 테이블 미표시
- 폼에 이전 입력값 유지 (value 속성 사용)

**파일명**: `profile_form.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

---

## ✅ 정답 및 풀이

### **객관식 정답**

| 문제 | 정답 | 풀이 |
|------|------|------|
| 1번 | **② GET은 데이터가 URL에 표시되고, POST는 숨겨진다** | POST 방식은 데이터가 HTTP 요청 본문에 담겨 URL에 표시되지 않습니다 |
| 2번 | **② POST (보안상 안전함)** | 회원가입은 민감한 정보(비밀번호)를 다루므로 POST를 사용합니다 |
| 3번 | **② 'POST'** | REQUEST_METHOD 값이 'POST'일 때 $_POST 데이터를 사용합니다 |
| 4번 | **① isset()은 변수 존재 확인, empty()는 값이 비어있는지 확인** | isset()은 NULL이 아닌지 확인, empty()는 값이 비어있거나 0, false 등인지 확인합니다 |
| 5번 | **① A만 출력** | isset(0)은 true (변수 존재), empty(0)은 true (0은 비어있음으로 간주)이므로 A만 출력됩니다 |
| 6번 | **③ filter_var($email, FILTER_VALIDATE_EMAIL)** | 이메일 형식을 검증하는 PHP 내장 함수입니다 |
| 7번 | **② HTML 특수문자를 문자 엔티티로 변환 (HTML 태그 인젝션 방지)** | htmlspecialchars()는 <, >, &, " 등을 HTML 엔티티로 변환합니다 |
| 8번 | **① &lt;script&gt;alert('공격')&lt;/script&gt; 출력** | htmlspecialchars()로 변환되어 스크립트가 실행되지 않습니다 |
| 9번 | **② `$sql = "SELECT * FROM students WHERE name LIKE ?";` (Prepared Statement)** | Prepared Statement를 사용하면 SQL Injection 공격으로부터 안전합니다 |
| 10번 | **② method="POST"** | 민감한 정보를 다루는 로그인은 POST 방식을 사용합니다 |

---

### **실기작업형 풀이**

#### **문제 1: 간단한 로그인 폼 (POST 사용) - 정답**

```php
<?php
/**
 * login_form.php - POST 방식 로그인 폼
 */

$username = '';
$password = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    if (!empty($username) && !empty($password)) {
        $message = "로그인 시도: " . $username;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        .form { max-width: 400px; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: navy; color: white; padding: 10px; width: 100%; cursor: pointer; }
        .message { color: green; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>

<div class="form">
    <h2>로그인</h2>
    
    <form method="POST">
        <label>아이디:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        
        <label>비밀번호:</label>
        <input type="password" name="password" required>
        
        <button type="submit">로그인</button>
    </form>
    
    <?php if ($message): ?>
    <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
```

**검증:**
✓ method="POST" 사용
✓ $_SERVER['REQUEST_METHOD'] === 'POST' 확인
✓ htmlspecialchars()로 데이터 안전 처리
✓ 폼에 이전 값 유지 (value 속성)

---

#### **문제 2: 검색 폼 (GET 사용) - 정답**

```php
<?php
/**
 * search_form.php - GET 방식 검색 폼
 */

$keyword = '';

if (isset($_GET['keyword'])) {
    $keyword = htmlspecialchars($_GET['keyword']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>검색</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 30px; }
        .search-box { padding: 20px; background-color: #f9f9f9; border-left: 4px solid #2196F3; }
        input { padding: 8px; width: 200px; }
        button { padding: 8px 20px; background-color: navy; color: white; cursor: pointer; }
        .result { padding: 20px; margin-top: 20px; background-color: #f0f0f0; }
    </style>
</head>
<body>

<div class="search-box">
    <h1>🔍 검색</h1>
    <form method="GET">
        <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="검색어 입력">
        <button type="submit">검색</button>
    </form>
</div>

<?php if ($keyword): ?>
<div class="result">
    <h3>검색어: <?php echo $keyword; ?></h3>
    <p>검색 결과를 표시합니다</p>
</div>
<?php endif; ?>

</body>
</html>
```

**검증:**
✓ method="GET" 사용
✓ isset($_GET['keyword']) 확인
✓ htmlspecialchars()로 데이터 안전 처리
✓ 검색어를 화면에 출력

---

#### **문제 3: 이메일 검증이 포함된 회원가입 폼 - 정답**

```php
<?php
/**
 * signup_form.php - 이메일 검증이 포함된 회원가입 폼
 */

$username = '';
$email = '';
$errors = array();
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    
    // 필드 확인
    if (empty($username)) {
        $errors[] = "아이디를 입력하세요";
    }
    
    if (empty($email)) {
        $errors[] = "이메일을 입력하세요";
    }
    
    // 이메일 형식 확인
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "올바른 이메일 형식이 아닙니다";
    }
    
    // 검증 통과
    if (count($errors) === 0) {
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        .container { max-width: 500px; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: navy; color: white; padding: 10px; width: 100%; cursor: pointer; }
        .error { color: red; padding: 5px; }
        .success { color: green; padding: 10px; background-color: #f0f0f0; }
    </style>
</head>
<body>

<div class="container">
    <h2>회원가입</h2>
    
    <?php if ($success): ?>
    <div class="success">✅ 가입 완료되었습니다!</div>
    <?php endif; ?>
    
    <?php foreach ($errors as $error): ?>
    <div class="error">❌ <?php echo $error; ?></div>
    <?php endforeach; ?>
    
    <form method="POST">
        <label>아이디:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        
        <label>이메일:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
        
        <button type="submit">가입하기</button>
    </form>
</div>

</body>
</html>
```

**검증:**
✓ POST 방식 폼
✓ isset()과 empty() 확인
✓ filter_var(FILTER_VALIDATE_EMAIL) 이메일 검증
✓ 오류 메시지 배열에 저장
✓ 폼에 이전 값 유지

---

#### **문제 4: 입력 데이터 검증 (길이 제한) - 정답**

```php
<?php
/**
 * validation_form.php - strlen()으로 길이 검증
 */

$username = '';
$password = '';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    // 아이디 길이 확인
    if (strlen($username) < 5) {
        $errors[] = "아이디는 5자 이상이어야 합니다";
    } elseif (strlen($username) > 20) {
        $errors[] = "아이디는 20자 이하여야 합니다";
    }
    
    // 비밀번호 길이 확인
    if (strlen($password) < 6) {
        $errors[] = "비밀번호는 6자 이상이어야 합니다";
    }
    
    // 검증 성공
    if (count($errors) === 0) {
        $errors[] = "✅ 모든 검증을 통과했습니다!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>검증 폼</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        .container { max-width: 400px; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: navy; color: white; padding: 10px; width: 100%; cursor: pointer; }
        .error { color: red; padding: 5px; margin: 5px 0; }
        .success { color: green; padding: 5px; margin: 5px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>계정 생성</h2>
    
    <?php foreach ($errors as $error): ?>
        <?php if (strpos($error, '✅') !== false): ?>
            <div class="success"><?php echo $error; ?></div>
        <?php else: ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <form method="POST">
        <label>아이디 (5~20자):</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        
        <label>비밀번호 (6자 이상):</label>
        <input type="password" name="password" required>
        
        <button type="submit">검증</button>
    </form>
</div>

</body>
</html>
```

**검증:**
✓ strlen()으로 문자열 길이 확인
✓ 최소/최대 길이 검증
✓ 오류 메시지 배열 저장
✓ 검증 결과 색상 구분 (빨강: 오류, 초록: 성공)

---

#### **문제 5: 폼 데이터 처리 및 안전한 출력 - 정답**

```php
<?php
/**
 * profile_form.php - htmlspecialchars()로 안전한 출력
 */

$name = '';
$major = '';
$introduction = '';
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $major = htmlspecialchars($_POST['major']);
    $introduction = htmlspecialchars($_POST['introduction']);
    $submitted = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>사용자 프로필</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 30px; }
        .container { max-width: 700px; padding: 20px; border: 1px solid #ddd; }
        input, textarea { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: navy; color: white; padding: 10px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th { background-color: navy; color: white; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>

<div class="container">
    <h1>📋 사용자 프로필</h1>
    
    <!-- 입력 폼 -->
    <h2>프로필 정보 입력</h2>
    <form method="POST">
        <label>이름:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="홍길동" required>
        
        <label>전공:</label>
        <input type="text" name="major" value="<?php echo $major; ?>" placeholder="소프트웨어공학" required>
        
        <label>자기소개:</label>
        <textarea name="introduction" rows="5" placeholder="자기소개를 입력하세요"><?php echo $introduction; ?></textarea>
        
        <button type="submit">저장</button>
    </form>
    
    <!-- 결과 표시 -->
    <?php if ($submitted && !empty($name) && !empty($major) && !empty($introduction)): ?>
    <h2>프로필 정보</h2>
    <table>
        <thead>
            <tr>
                <th>항목</th>
                <th>내용</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>이름</td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>전공</td>
                <td><?php echo $major; ?></td>
            </tr>
            <tr>
                <td>자기소개</td>
                <td><?php echo nl2br($introduction); ?></td>
            </tr>
        </tbody>
    </table>
    <?php endif; ?>
</div>

</body>
</html>
```

**검증:**
✓ REQUEST_METHOD 확인 (POST)
✓ htmlspecialchars()로 모든 입력값 안전 처리
✓ 폼에 이전 입력값 유지 (value 속성)
✓ textarea에 이전 값 유지
✓ 제출 후에만 결과 테이블 표시
✓ nl2br()로 줄바꿈 처리

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **GET vs POST**: GET(URL 표시) vs POST(숨김), 보안성 차이
2. **검증 함수**: isset(존재 확인) vs empty(빈값 확인)
3. **필터 함수**: filter_var($email, FILTER_VALIDATE_EMAIL)
4. **안전성**: htmlspecialchars() 항상 사용
5. **폼 제출 확인**: $_SERVER['REQUEST_METHOD'] === 'POST'

### **실기작업형 풀이 전략**

1. **폼 작성**: method, action, name 속성 정확히
2. **폼 제출 확인**: REQUEST_METHOD 체크
3. **데이터 수신**: $_POST 또는 $_GET 사용
4. **검증**: isset(), empty(), strlen(), filter_var()
5. **안전 처리**: htmlspecialchars() 및 이전 값 유지
6. **오류 처리**: 배열에 모아서 foreach로 출력
7. **조건부 표시**: 제출 후에만 결과 표시

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수(peterchokr@gmail.com)  
영남이공대학교

