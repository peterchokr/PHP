# 📝 6장 연습문제: 세션, 쿠키 & 로그인 시스템

---

## 🎯 객관식 10문제

#### **1번. session_start()는 언제 호출해야 한다?**

① HTML 코드 출력 후
② 모든 PHP 코드 출력 후
③ 모든 PHP 파일의 맨 처음
④ $_SESSION을 사용하기 직전

---

#### **2번. 세션과 쿠키의 가장 큰 차이점은?**

① 세션은 서버에, 쿠키는 클라이언트에 저장된다
② 쿠키는 서버에, 세션은 클라이언트에 저장된다
③ 둘 다 서버에 저장된다
④ 둘 다 클라이언트에 저장된다

---

#### **3번. 다음 코드의 결과는?**

```php
session_start();

$_SESSION['user'] = '홍길동';

if (isset($_SESSION['user'])) {
    echo "세션 존재";
} else {
    echo "세션 없음";
}
```

① 세션 존재
② 세션 없음
③ 오류 발생
④ 아무것도 출력 안 됨

---

#### **4번. session_destroy()의 역할은?**

① $_SESSION 배열 전체를 리셋한다
② 특정 세션 데이터만 삭제한다
③ 모든 세션 데이터를 삭제한다
④ 서버를 재시작한다

---

#### **5번. 다음 쿠키 설정에서 쿠키가 30일 후에 삭제된다?**

```php
setcookie('user_theme', 'dark', time() + (86400 * 30));
```

① 맞다
② 틀렸다 (60일 후)
③ 틀렸다 (15일 후)
④ 쿠키는 항상 영구 저장된다

---

#### **6번. password_hash()와 password_verify()의 관계는?**

① password_hash(): 비밀번호를 입력받아 저장, password_verify(): 입력값과 저장값 비교
② password_hash(): 암호 해제, password_verify(): 암호화
③ 둘 다 비밀번호 암호화 함수
④ 역할이 반대다

---

#### **7번. 다음 코드의 실행 결과는?**

```php
$password = '12345678';
$hashed = password_hash($password, PASSWORD_DEFAULT);

if (password_verify('12345678', $hashed)) {
    echo "일치";
} else {
    echo "불일치";
}
```

① 일치
② 불일치
③ 오류 발생
④ 예측 불가

---

#### **8번. header("Location: login.php")를 실행한 후 하나 이상 실행되어야 할 함수는?**

① return;
② exit;
③ session_start();
④ session_destroy();

---

#### **9번. 비밀번호를 데이터베이스에 저장할 때 가장 안전한 방법은?**

① 평문으로 저장한다
② 간단한 암호화 함수 사용
③ password_hash()로 해시하여 저장
④ 특수문자만 제거하고 저장

---

#### **10번. 로그인이 필수인 페이지에서 로그인 확인 코드는?**

① `if (isset($_SESSION['user_id'])) { ... }`
② `if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }`
③ `if ($_SESSION['user_id']) { ... }`
④ `if ($SESSION['user_id'] !== null) { ... }`

---

## 💻 실기작업형 5문제

### **문제 1: 세션 시작 및 데이터 저장**

**요구사항:**

- session_start() 호출
- $_SESSION에 사용자 정보 저장
  - 'user_id' = 1
  - 'username' = '홍길동'
  - 'email' = 'hong@example.com'
- isset()으로 세션 데이터 확인
- 형식: "사용자: 홍길동, 이메일: hong@example.com"으로 출력

**파일명**: `session_basic.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 2: 쿠키 설정 및 사용**

**요구사항:**

- setcookie()로 사용자 테마 설정 저장 (30일 후 만료)
- $_COOKIE로 저장된 값 읽기
- 쿠키 삭제 (만료 시간을 과거로 설정)
- 현재 설정된 테마 표시

**파일명**: `cookie_example.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 3: password_hash와 password_verify**

**요구사항:**

- 사용자 비밀번호 입력 (POST 폼)
- password_hash()로 해시 생성 (회원가입 시뮬레이션)
- password_verify()로 입력한 비밀번호와 해시 비교
- 일치/불일치 결과 표시
- HTML 폼 포함

**파일명**: `password_handler.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 4: 기본 로그인 시스템**

**요구사항:**

- POST 폼으로 아이디, 비밀번호 입력
- 하드코딩된 사용자 정보로 로그인 검증
  - 아이디: "admin"
  - 비밀번호: "12345678" (해시로 저장)
- password_verify()로 비밀번호 확인
- 로그인 성공 시: $_SESSION에 user_id, username 저장
- 로그인 실패 시: 오류 메시지 표시
- 로그아웃 기능

**파일명**: `login_system.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: 로그인 확인 및 페이지 보호**

**요구사항:**

- session_start() 호출
- isset($_SESSION['user_id'])로 로그인 확인
- 로그인하지 않은 사용자는 로그인 페이지로 리다이렉트
- 로그인한 사용자에게만 개인정보 표시
  - 사용자명
  - 사용자 ID
- 로그아웃 버튼 포함

**파일명**: `protected_page.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

---

## ✅ 정답 및 풀이

### **객관식 정답**

| 문제 | 정답                                                                                        | 풀이                                                        |
| ---- | ------------------------------------------------------------------------------------------- | ----------------------------------------------------------- |
| 1번  | **③ 모든 PHP 파일의 맨 처음**                                                        | session_start()는 HTML 출력 전에 실행해야 합니다            |
| 2번  | **① 세션은 서버에, 쿠키는 클라이언트에 저장된다**                                    | 세션은 서버의 메모리/파일에, 쿠키는 브라우저에 저장됩니다   |
| 3번  | **① 세션 존재**                                                                      | $_SESSION['user']가 저장되었으므로 isset()는 true입니다     |
| 4번  | **③ 모든 세션 데이터를 삭제한다**                                                    | session_destroy()는 서버의 모든 $_SESSION 정보를 제거합니다 |
| 5번  | **① 맞다**                                                                           | time() + (86400 * 30)은 30일 후를 의미합니다 (86400 = 1일)  |
| 6번  | **① password_hash(): 비밀번호 저장, password_verify(): 비밀번호 비교**               | password_hash는 해시 생성, password_verify는 검증입니다     |
| 7번  | **① 일치**                                                                           | password_verify('12345678', $hashed)는 일치 시 true입니다   |
| 8번  | **② exit;**                                                                          | header() 후 exit;를 호출하여 이후 코드 실행을 방지합니다    |
| 9번  | **③ password_hash()로 해시하여 저장**                                                | 평문 저장은 보안 위험이므로 반드시 해시화해야 합니다        |
| 10번 | **② `if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }`** | 로그인하지 않은 사용자를 차단하고 리다이렉트합니다          |

---

### **실기작업형 풀이**

#### **문제 1: 세션 시작 및 데이터 저장 - 정답**

```php
<?php
/**
 * session_basic.php - 세션 시작 및 데이터 저장
 */

// 1단계: 세션 시작 (맨 처음)
session_start();

// 2단계: $_SESSION에 사용자 정보 저장
$_SESSION['user_id'] = 1;
$_SESSION['username'] = '홍길동';
$_SESSION['email'] = 'hong@example.com';

// 3단계: 세션 데이터 확인 및 출력
if (isset($_SESSION['user_id']) && 
    isset($_SESSION['username']) && 
    isset($_SESSION['email'])) {
  
    $output = "사용자: " . $_SESSION['username'] . 
              ", 이메일: " . $_SESSION['email'];
    echo $output;
} else {
    echo "세션 데이터가 없습니다";
}

?>
```

**검증:**
✓ session_start() 맨 처음 호출
✓ $_SESSION에 user_id, username, email 저장
✓ isset()으로 여러 데이터 확인
✓ 지정된 형식으로 출력

---

#### **문제 2: 쿠키 설정 및 사용 - 정답**

```php
<?php
/**
 * cookie_example.php - 쿠키 설정 및 사용
 */

// 1단계: 쿠키 설정 (30일 후 만료)
setcookie('user_theme', 'dark', time() + (86400 * 30));

// 2단계: 쿠키 값 읽기
$theme = isset($_COOKIE['user_theme']) ? $_COOKIE['user_theme'] : '기본값';

?>

<!DOCTYPE html>
<html>
<head>
    <title>쿠키 예제</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 30px; }
        .container { max-width: 500px; padding: 20px; border: 1px solid #ddd; }
        button { padding: 10px 20px; background-color: navy; color: white; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>🎨 테마 설정</h1>
  
    <p>현재 테마: <strong><?php echo htmlspecialchars($theme); ?></strong></p>
  
    <form action="cookie_set.php" method="POST" style="display:inline;">
        <button type="submit" name="theme" value="light">Light 테마</button>
        <button type="submit" name="theme" value="dark">Dark 테마</button>
    </form>
  
    <form action="cookie_delete.php" method="POST" style="display:inline;">
        <button type="submit">쿠키 삭제</button>
    </form>
</div>

</body>
</html>
```

**검증:**
✓ setcookie()로 30일 후 만료 설정
✓ isset($_COOKIE['user_theme']) 확인
✓ 쿠키 값 출력
✓ 쿠키 삭제 폼 포함 (만료 시간을 과거로)

---

#### **문제 3: password_hash와 password_verify - 정답**

```php
<?php
/**
 * password_handler.php - password_hash와 password_verify
 */

$message = '';
$password_input = '';

// 회원가입 시뮬레이션 (고정 비밀번호)
$original_password = '12345678';
$hashed_password = password_hash($original_password, PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password_input = htmlspecialchars($_POST['password']);
  
    // password_verify()로 비밀번호 확인
    if (password_verify($password_input, $hashed_password)) {
        $message = "✅ 비밀번호가 일치합니다!";
    } else {
        $message = "❌ 비밀번호가 일치하지 않습니다";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>비밀번호 검증</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        .container { max-width: 400px; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: navy; color: white; padding: 10px; width: 100%; cursor: pointer; }
        .success { color: green; padding: 10px; }
        .error { color: red; padding: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h1>🔐 비밀번호 검증</h1>
  
    <p>테스트 비밀번호: <code>12345678</code></p>
  
    <form method="POST">
        <label>비밀번호 입력:</label>
        <input type="password" name="password" value="<?php echo $password_input; ?>" required>
      
        <button type="submit">검증</button>
    </form>
  
    <?php if ($message): ?>
        <?php if (strpos($message, '✅') !== false): ?>
            <p class="success"><?php echo $message; ?></p>
        <?php else: ?>
            <p class="error"><?php echo $message; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
```

**검증:**
✓ password_hash()로 해시 생성
✓ password_verify()로 비교
✓ POST 폼으로 입력 받음
✓ 일치/불일치 결과 표시

---

#### **문제 4: 기본 로그인 시스템 - 정답**

```php
<?php
/**
 * login_system.php - 기본 로그인 시스템
 */

session_start();

// 하드코딩된 사용자 정보 (실제로는 데이터베이스에서 조회)
$admin_username = 'admin';
$admin_password_hash = password_hash('12345678', PASSWORD_DEFAULT);

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "아이디와 비밀번호를 입력하세요";
    } else {
      
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
      
        // 아이디 확인
        if ($username === $admin_username) {
          
            // password_verify()로 비밀번호 확인
            if (password_verify($password, $admin_password_hash)) {
                // 로그인 성공: 세션 저장
                $_SESSION['user_id'] = 1;
                $_SESSION['username'] = $username;
                $success = true;
            } else {
                $error = "비밀번호가 잘못되었습니다";
            }
        } else {
            $error = "아이디가 존재하지 않습니다";
        }
    }
}

// 로그아웃 처리
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login_system.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>로그인 시스템</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        .container { max-width: 400px; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: navy; color: white; padding: 10px; width: 100%; cursor: pointer; }
        .error { color: red; padding: 10px; }
        .success { color: green; padding: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h1>로그인</h1>
  
    <?php if ($success): ?>
        <div class="success">✅ 로그인 성공!</div>
        <p>사용자: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <form method="POST">
            <button type="submit" name="logout" value="1">로그아웃</button>
        </form>
    <?php else: ?>
        <?php if ($error): ?>
            <div class="error">❌ <?php echo $error; ?></div>
        <?php endif; ?>
      
        <form method="POST">
            <label>아이디:</label>
            <input type="text" name="username" placeholder="admin" required>
          
            <label>비밀번호:</label>
            <input type="password" name="password" placeholder="12345678" required>
          
            <button type="submit">로그인</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
```

**검증:**
✓ session_start() 호출
✓ password_hash로 해시 저장
✓ password_verify로 검증
✓ 로그인 성공 시 $_SESSION 저장
✓ 오류 메시지 표시
✓ 로그아웃 기능 (session_destroy)

---

#### **문제 5: 로그인 확인 및 페이지 보호 - 정답**

```php
<?php
/**
 * protected_page.php - 로그인 필수 페이지
 */

session_start();

// 로그인 확인: 로그인하지 않으면 로그인 페이지로 리다이렉트
if (!isset($_SESSION['user_id'])) {
    header("Location: login_system.php");
    exit;  // 중요: exit;로 이 아래 코드 실행 방지
}

// 로그아웃 처리
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login_system.php");
    exit;
}

// 여기부터는 로그인한 사용자만 볼 수 있는 콘텐츠

?>

<!DOCTYPE html>
<html>
<head>
    <title>마이페이지</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        .container { max-width: 600px; padding: 20px; border: 1px solid #ddd; }
        h1 { color: navy; }
        .user-info { 
            padding: 15px; 
            background-color: #f9f9f9; 
            border-left: 4px solid #2196F3; 
            margin: 20px 0;
        }
        button { background-color: navy; color: white; padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>마이페이지</h1>
  
    <div class="user-info">
        <p><strong>사용자명:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <p><strong>사용자 ID:</strong> <?php echo $_SESSION['user_id']; ?></p>
    </div>
  
    <p>로그인한 사용자만 볼 수 있는 개인정보입니다.</p>
  
    <form method="POST">
        <button type="submit" name="logout" value="1">로그아웃</button>
    </form>
</div>

</body>
</html>
```

**검증:**
✓ session_start() 호출
✓ !isset($_SESSION['user_id'])로 로그인 확인
✓ 미로그인 사용자 리다이렉트 + exit;
✓ 개인정보 표시 (username, user_id)
✓ htmlspecialchars()로 안전 처리
✓ 로그아웃 버튼 포함

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **세션 위치**: session_start()는 항상 첫 번째 (HTML 출력 전)
2. **세션 vs 쿠키**: 저장 위치 차이 (서버 vs 클라이언트)
3. **session_destroy()**: 모든 세션 삭제
4. **비밀번호**: password_hash(저장) ↔ password_verify(검증)
5. **리다이렉트**: header() 후에는 exit; 필수
6. **로그인 보호**: !isset($_SESSION['user_id']) 확인

### **실기작업형 풀이 전략**

1. **세션**: session_start() → $_SESSION 저장/확인 → isset()
2. **쿠키**: setcookie() → $_COOKIE 사용 → 삭제 시 과거 시간
3. **비밀번호**: password_hash() 저장 → password_verify() 검증
4. **로그인**: 아이디 확인 → password_verify() → $_SESSION 저장
5. **페이지 보호**: !isset() → header() + exit → 콘텐츠 표시

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수([peterchokr@gmail.com](mailto:peterchokr@gmail.com)) 영남이공대학교

이 연습문제는 Claude 및 Gemini와 협업으로 제작되었습니다.
