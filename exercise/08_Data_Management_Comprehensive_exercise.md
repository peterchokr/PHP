# 📝 8장 연습문제: 데이터 관리 & 종합 실습

---

## 🎯 객관식 10문제

#### **1번. CRUD 작업에서 "Update"가 의미하는 것은?**

① 새로운 데이터 추가
② 기존 데이터 조회
③ 기존 데이터 수정
④ 데이터 삭제

---

#### **2번. Prepared Statement의 주요 이점은?**

① 쿼리 실행 속도 증가
② SQL Injection 공격 방어
③ 데이터베이스 용량 절감
④ 자동 로그인 기능

---

#### **3번. 다음 중 하나의 행(row)을 반환하는 PDO 함수는?**

① `fetchAll()`
② `fetch()`
③ `execute()`
④ `prepare()`

---

#### **4번. UPDATE, DELETE 쿼리 실행 시 반드시 필요한 것은?**

① GROUP BY 절
② WHERE 절
③ JOIN 절
④ ORDER BY 절

---

#### **5번. FOREIGN KEY의 역할은?**

① 데이터의 기본 키 설정
② 다른 테이블의 키를 참조하여 관계 설정
③ 자동 증가 설정
④ 기본값 설정

---

#### **6번. PDO::FETCH_ASSOC의 의미는?**

① 숫자 인덱스로 배열 반환
② 컬럼명이 키인 연관배열 반환
③ 객체 형태로 반환
④ 문자열로 반환

---

#### **7번. 데이터 출력 시 htmlspecialchars()를 사용하는 이유는?**

① 데이터베이스 크기 축소
② HTML 특수문자를 엔티티로 변환하여 보안 강화
③ 쿼리 속도 향상
④ 자동 암호화

---

#### **8번. 로그인한 사용자만 접근 가능하게 하려면?**

① `if (isset($_SESSION['user_id']))`
② `if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }`
③ `if ($_SESSION['password'] !== null)`
④ `if (isset($_COOKIE['username']))`

---

#### **9번. INSERT 쿼리에서 Prepared Statement를 사용하는 예시는?**

① `$sql = "INSERT INTO todos VALUES ($user_id, $title)"`
② `$sql = "INSERT INTO todos VALUES (?, ?)"; $stmt->execute([$user_id, $title])`
③ `INSERT INTO todos SET user_id = $user_id`
④ `INSERT INTO todos VALUES ("' . $title . '")`

---

#### **10번. 다음 중 보안을 가장 잘 구현한 경우는?**

① Prepared Statement + htmlspecialchars() + WHERE user_id = ?
② 입력값 검증만 함
③ htmlspecialchars()만 사용
④ 아무 처리 안 함

---

## 💻 실기작업형 5문제

### **문제 1: 데이터베이스 설계 (테이블 생성)**

**요구사항:**

- 데이터베이스 생성 (CREATE DATABASE)
- users 테이블 생성
  - id (PRIMARY KEY, AUTO_INCREMENT)
  - username (VARCHAR, UNIQUE)
  - password (VARCHAR)
  - created_at (TIMESTAMP)
- todos 테이블 생성
  - id (PRIMARY KEY, AUTO_INCREMENT)
  - user_id (INT, FOREIGN KEY)
  - title (VARCHAR)
  - status (ENUM: 'incomplete', 'complete')
  - created_at (TIMESTAMP)
- FOREIGN KEY 관계 설정

**파일명**: `create_tables.sql`

```sql
-- 여기에 코드를 작성하세요
```

---

### **문제 2: INSERT 쿼리로 데이터 추가**

**요구사항:**

- PDO 데이터베이스 연결
- Prepared Statement 사용 (? 자리표시)
- 입력값 검증 (제목 필수, 200자 이하)
- htmlspecialchars() 사용
- try-catch로 에러 처리
- INSERT 쿼리 실행
- execute()에 배열로 값 전달
- 성공/실패 메시지 표시
- HTML 폼 포함

**파일명**: `add_todo.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 3: SELECT 쿼리로 데이터 조회**

**요구사항:**

- PDO 데이터베이스 연결
- SELECT 쿼리로 사용자의 TODO 목록 조회
- WHERE user_id = ? 조건 포함
- ORDER BY created_at DESC 정렬
- prepare() + execute() 사용
- fetchAll(PDO::FETCH_ASSOC) 사용
- try-catch 에러 처리
- 데이터 반복문으로 출력
- htmlspecialchars()로 안전 처리
- 빈 목록 메시지 표시

**파일명**: `list_todos.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 4: UPDATE 쿼리로 데이터 수정**

**요구사항:**

- 기존 데이터 조회 (SELECT + WHERE id = ?)
- fetch()로 하나의 행 가져오기
- 소유자 확인 (WHERE id = ? AND user_id = ?)
- POST 요청 처리
- 입력값 검증
- UPDATE 쿼리 실행
- WHERE 절에 id AND user_id 조건
- execute()에 [$title, $status, $id, $user_id] 전달
- try-catch 에러 처리
- 수정 완료 후 리다이렉트

**파일명**: `edit_todo.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: DELETE 쿼리로 데이터 삭제**

**요구사항:**

- DELETE 쿼리 작성
- WHERE 절에 id와 user_id 조건 (반드시!)
- Prepared Statement 사용
- execute([$id, $user_id]) 형식
- 삭제 성공 확인
- try-catch 에러 처리
- 삭제 후 list_todos.php로 리다이렉트
- JavaScript confirm()으로 삭제 확인
- 보안: user_id 확인 필수

**파일명**: `delete_todo.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

---

## ✅ 정답 및 풀이

### **객관식 정답**

| 문제 | 정답                                                                                          | 풀이                                                                 |
| ---- | --------------------------------------------------------------------------------------------- | -------------------------------------------------------------------- |
| 1번  | **③ 기존 데이터 수정**                                                                 | UPDATE는 기존 데이터를 수정하는 SQL 명령어입니다                     |
| 2번  | **② SQL Injection 공격 방어**                                                          | Prepared Statement는 사용자 입력값을 안전하게 처리합니다             |
| 3번  | **② `fetch()`**                                                                      | fetch()는 하나의 행을 반환하고, fetchAll()은 모든 행을 반환합니다    |
| 4번  | **② WHERE 절**                                                                         | UPDATE, DELETE는 WHERE 절이 없으면 전체 데이터가 영향을 받습니다     |
| 5번  | **② 다른 테이블의 키를 참조하여 관계 설정**                                            | FOREIGN KEY는 테이블 간의 관계를 설정합니다                          |
| 6번  | **② 컬럼명이 키인 연관배열 반환**                                                      | PDO::FETCH_ASSOC는 컬럼명을 키로 하는 연관배열을 반환합니다          |
| 7번  | **② HTML 특수문자를 엔티티로 변환하여 보안 강화**                                      | htmlspecialchars()는 XSS 공격을 방어합니다                           |
| 8번  | **② `if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }`**   | 로그인하지 않은 사용자를 차단하고 리다이렉트합니다                   |
| 9번  | **② `$sql = "INSERT INTO todos VALUES (?, ?)"; $stmt->execute([$user_id, $title])`** | Prepared Statement는 ?로 값을 표시하고 execute()에 배열로 전달합니다 |
| 10번 | **① Prepared Statement + htmlspecialchars() + WHERE user_id = ?**                      | 3가지 보안 처리를 모두 적용한 것이 가장 안전합니다                   |

---

### **실기작업형 풀이**

#### **문제 1: 데이터베이스 설계 - 정답**

```sql
-- 데이터베이스 생성
CREATE DATABASE IF NOT EXISTS todo_app;
USE todo_app;

-- users 테이블
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- todos 테이블
CREATE TABLE todos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    status ENUM('incomplete', 'complete') DEFAULT 'incomplete',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

**검증:**
✓ CREATE DATABASE IF NOT EXISTS
✓ users 테이블: id, username (UNIQUE), password, created_at
✓ todos 테이블: id, user_id, title, status (ENUM)
✓ FOREIGN KEY 관계 설정
✓ ON DELETE CASCADE (사용자 삭제 시 TODO도 삭제)

---

#### **문제 2: INSERT 쿼리로 데이터 추가 - 정답**

```php
<?php
/**
 * add_todo.php - TODO 추가
 */

require 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 1단계: 입력값 정제
        $title = htmlspecialchars(trim($_POST['title'] ?? ''));
      
        // 2단계: 입력값 검증
        if (empty($title)) {
            throw new Exception("제목을 입력하세요");
        }
        if (strlen($title) > 200) {
            throw new Exception("제목은 200자 이하여야 합니다");
        }
      
        // 3단계: INSERT 쿼리 (Prepared Statement)
        $sql = "INSERT INTO todos (user_id, title, status) VALUES (?, ?, 'incomplete')";
        $stmt = $pdo->prepare($sql);
        // 4단계: execute()에 배열로 값 전달
        $stmt->execute([$user_id, $title]);
      
        $success = "✅ TODO가 추가되었습니다!";
      
    } catch (Exception $e) {
        // 5단계: 에러 처리
        $error = "❌ " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>TODO 추가</title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 600px; margin: 50px auto; padding: 20px; }
        h1 { color: navy; }
        form { background: #f5f5f5; padding: 15px; }
        input { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ddd; box-sizing: border-box; }
        button { background: navy; color: white; padding: 8px 15px; border: none; cursor: pointer; width: 100%; }
        .error { color: red; padding: 8px; background: #ffe6e6; }
        .success { color: green; padding: 8px; background: #e6ffe6; }
        a { color: navy; text-decoration: none; }
    </style>
</head>
<body>

<h1>📝 새 TODO 추가</h1>

<?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="success"><?php echo htmlspecialchars($success); ?></div>
    <a href="list_todos.php">← 목록으로 돌아가기</a>
<?php else: ?>
    <form method="POST">
        <input type="text" name="title" placeholder="해야 할 일을 입력하세요" autofocus required>
        <button type="submit">추가하기</button>
    </form>
    <a href="list_todos.php">← 목록으로 돌아가기</a>
<?php endif; ?>

</body>
</html>
```

**검증:**
✓ require 'config.php' (데이터베이스 연결)
✓ htmlspecialchars() 입력값 정제
✓ trim() 공백 제거
✓ 입력값 검증 (필수, 200자)
✓ try-catch 에러 처리
✓ Prepared Statement (?)
✓ execute([$user_id, $title])
✓ HTML 폼 포함

---

#### **문제 3: SELECT 쿼리로 데이터 조회 - 정답**

```php
<?php
/**
 * list_todos.php - TODO 목록 조회
 */

require 'config.php';

$todos = [];

try {
    // SELECT 쿼리 작성
    // WHERE user_id = ? : 현재 사용자의 TODO만 조회
    // ORDER BY created_at DESC : 최신순 정렬
    $sql = "SELECT id, title, status, created_at FROM todos 
            WHERE user_id = ? 
            ORDER BY created_at DESC";
  
    // 1단계: prepare()로 쿼리 준비
    $stmt = $pdo->prepare($sql);
  
    // 2단계: execute()로 쿼리 실행
    $stmt->execute([$user_id]);
  
    // 3단계: fetchAll(PDO::FETCH_ASSOC)로 모든 행 가져오기
    // PDO::FETCH_ASSOC = 컬럼명을 키로 하는 연관배열
    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
} catch (PDOException $e) {
    die("조회 실패: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>TODO 목록</title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 800px; margin: 50px auto; padding: 20px; }
        h1 { color: navy; }
        a { display: inline-block; margin: 10px 5px 10px 0; padding: 8px 12px; background: navy; color: white; text-decoration: none; }
        .todo-item { border: 1px solid #ddd; padding: 12px; margin: 10px 0; background: #f9f9f9; display: flex; justify-content: space-between; }
        .todo-title { font-weight: bold; }
        .status-complete { color: green; }
        .empty { color: #999; padding: 20px; }
    </style>
</head>
<body>

<h1>📋 나의 TODO 목록</h1>

<a href="add_todo.php">➕ 새 TODO 추가</a>
<a href="logout.php">🚪 로그아웃</a>

<?php if (empty($todos)): ?>
    <div class="empty">해야 할 일이 없습니다.</div>
<?php else: ?>
    <?php foreach ($todos as $todo): ?>
        <div class="todo-item">
            <div>
                <div class="todo-title"><?php echo htmlspecialchars($todo['title']); ?></div>
                <div class="todo-meta">
                    <?php echo $todo['created_at']; ?>
                    <span class="<?php echo $todo['status'] === 'complete' ? 'status-complete' : ''; ?>">
                        (<?php echo $todo['status'] === 'complete' ? '완료' : '미완료'; ?>)
                    </span>
                </div>
            </div>
            <a href="edit_todo.php?id=<?php echo $todo['id']; ?>">수정</a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
```

**검증:**
✓ require 'config.php'
✓ SELECT ... WHERE user_id = ? 사용자 필터
✓ ORDER BY created_at DESC 정렬
✓ prepare() + execute([$user_id])
✓ fetchAll(PDO::FETCH_ASSOC)
✓ try-catch 에러 처리
✓ foreach 반복문
✓ htmlspecialchars()로 안전 처리
✓ empty() 확인

---

#### **문제 4: UPDATE 쿼리로 데이터 수정 - 정답**

```php
<?php
/**
 * edit_todo.php - TODO 수정
 */

require 'config.php';

$error = '';
$todo = null;
$id = $_GET['id'] ?? null;

if (!$id) {
    die("잘못된 요청입니다");
}

// 기존 데이터 조회
try {
    // 1단계: WHERE id = ? AND user_id = ? (소유자 확인)
    $sql = "SELECT id, title, status FROM todos WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $user_id]);
  
    // 2단계: fetch()로 하나의 행 가져오기
    $todo = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$todo) {
        die("TODO를 찾을 수 없습니다");
    }
  
} catch (PDOException $e) {
    die("조회 실패: " . $e->getMessage());
}

// POST 요청 처리 (수정)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // 3단계: 입력값 정제 및 검증
        $title = htmlspecialchars(trim($_POST['title'] ?? ''));
        $status = $_POST['status'] ?? 'incomplete';
      
        if (empty($title)) {
            throw new Exception("제목을 입력하세요");
        }
      
        // 4단계: UPDATE 쿼리 (WHERE에 id AND user_id)
        $sql = "UPDATE todos SET title = ?, status = ? WHERE id = ? AND user_id = ?";
        $stmt = $pdo->prepare($sql);
        // 5단계: execute()에 [$title, $status, $id, $user_id] 전달
        $stmt->execute([$title, $status, $id, $user_id]);
      
        // 6단계: 수정 완료 후 리다이렉트
        header("Location: list_todos.php");
        exit;
      
    } catch (Exception $e) {
        // 에러 처리
        $error = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>TODO 수정</title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 600px; margin: 50px auto; padding: 20px; }
        form { background: #f5f5f5; padding: 15px; }
        input, select { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ddd; box-sizing: border-box; }
        button { background: navy; color: white; padding: 8px 15px; border: none; cursor: pointer; width: 100%; }
        .error { color: red; padding: 8px; background: #ffe6e6; }
        a { color: navy; text-decoration: none; }
    </style>
</head>
<body>

<h1>✏️ TODO 수정</h1>

<?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<form method="POST">
    <input type="text" name="title" value="<?php echo htmlspecialchars($todo['title']); ?>" required>
  
    <select name="status">
        <option value="incomplete" <?php echo $todo['status'] === 'incomplete' ? 'selected' : ''; ?>>미완료</option>
        <option value="complete" <?php echo $todo['status'] === 'complete' ? 'selected' : ''; ?>>완료</option>
    </select>
  
    <button type="submit">수정하기</button>
</form>

<a href="list_todos.php">← 목록으로 돌아가기</a>

</body>
</html>
```

**검증:**
✓ require 'config.php'
✓ SELECT WHERE id = ? AND user_id = ? (소유자 확인)
✓ fetch() 단일 행 조회
✓ POST 요청 처리
✓ 입력값 검증
✓ UPDATE ... WHERE id = ? AND user_id = ?
✓ execute([$title, $status, $id, $user_id])
✓ try-catch 에러 처리
✓ 수정 완료 후 리다이렉트

---

#### **문제 5: DELETE 쿼리로 데이터 삭제 - 정답**

```php
<?php
/**
 * delete_todo.php - TODO 삭제
 */

require 'config.php';

// GET으로 전달된 id 받기
$id = $_GET['id'] ?? null;

if (!$id) {
    die("잘못된 요청입니다");
}

try {
    // 1단계: 삭제 전 해당 TODO가 존재하는지 확인
    $sql = "SELECT id FROM todos WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $user_id]);
  
    if (!$stmt->fetch()) {
        die("TODO를 찾을 수 없습니다");
    }
  
    // 2단계: DELETE 쿼리 (반드시 WHERE 절!)
    // WHERE id = ? AND user_id = ? : 자신의 TODO만 삭제
    $sql = "DELETE FROM todos WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($sql);
  
    // 3단계: execute([$id, $user_id]) 실행
    $stmt->execute([$id, $user_id]);
  
    // 4단계: 삭제 완료 후 리다이렉트
    header("Location: list_todos.php");
    exit;
  
} catch (PDOException $e) {
    die("삭제 실패: " . $e->getMessage());
}

?>
```

**list_todos.php에 삭제 버튼 추가:**

```php
<!-- list_todos.php의 <a> 태그 추가 -->
<a href="delete_todo.php?id=<?php echo $todo['id']; ?>" 
   onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
```

**검증:**
✓ require 'config.php'
✓ GET으로 id 받기
✓ 삭제 전 SELECT로 존재 확인
✓ WHERE id = ? AND user_id = ? (필수!)
✓ Prepared Statement 사용
✓ execute([$id, $user_id])
✓ try-catch 에러 처리
✓ 삭제 완료 후 리다이렉트
✓ JavaScript confirm()으로 삭제 확인

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **CRUD**: CREATE(INSERT), READ(SELECT), UPDATE, DELETE
2. **Prepared Statement**: ? 자리표시 사용 (SQL Injection 방어)
3. **fetch() vs fetchAll()**: 단일 행 vs 모든 행
4. **WHERE 절**: UPDATE, DELETE 필수 (없으면 전체 영향!)
5. **FOREIGN KEY**: 테이블 간 관계 설정
6. **FETCH_ASSOC**: 컬럼명을 키로 하는 배열
7. **htmlspecialchars()**: XSS 공격 방어
8. **로그인 확인**: !isset() + header("Location: login.php")
9. **Prepared Statement**: ? 사용 + execute([])
10. **종합 보안**: Prepared + htmlspecialchars + WHERE user_id

### **실기작업형 풀이 전략**

1. **테이블 설계**: PRIMARY KEY, FOREIGN KEY, ENUM, TIMESTAMP
2. **INSERT**: prepare() → execute([$user_id, $title])
3. **SELECT**: WHERE user_id = ? → fetchAll() → foreach
4. **UPDATE**: WHERE id AND user_id → execute([$title, $status, $id, $user_id])
5. **DELETE**: WHERE id AND user_id → execute([$id, $user_id])

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수([peterchokr@gmail.com](mailto:peterchokr@gmail.com)) 영남이공대학교

이 연습문제는 Claude 및 Gemini와 협업으로 제작되었습니다.
