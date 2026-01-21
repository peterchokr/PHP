# 4장: MySQL 복습 & PHP-MySQL 연동

---

## 학습목표

**학습목표**: PHP에서 MySQL 데이터베이스에 접근하고 안전하게 데이터를 처리할 수 있음

이 장을 학습하고 나면 다음을 할 수 있습니다:

✅ MySQL의 주요 명령어(CREATE, INSERT, SELECT, UPDATE, DELETE)를 이해할 수 있습니다.
✅ PHP에서 MySQL 데이터베이스에 연결할 수 있습니다.
✅ PDO를 사용하여 안전하게 데이터를 조회할 수 있습니다.
✅ SQL Injection 공격의 위험성을 이해하고 방어할 수 있습니다.
✅ Prepared Statement로 안전한 쿼리를 작성할 수 있습니다.

---

## 1️⃣ MySQL 기본 명령어 복습

### 1-1 데이터베이스와 테이블의 개념

**데이터베이스?** 데이터를 체계적으로 저장하는 공간입니다.
**테이블?** 데이터베이스 안의 표 형태의 데이터 저장소입니다.

```sql
CREATE DATABASE test_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE test_db;
```

### 1-2 CREATE TABLE - 테이블 생성

```sql
-- 학생 정보를 저장하는 테이블
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    age INT,
    score FLOAT
);

-- 각 필드 설명:
-- id: 학생 고유번호 (자동으로 증가)
-- name: 이름 (필수 입력)
-- email: 이메일
-- age: 나이
-- score: 성적
```

### 1-3 INSERT - 데이터 삽입

```sql
INSERT INTO students (name, email, age, score)
VALUES ('홍길동', 'hong@example.com', 20, 85);

INSERT INTO students (name, email, age, score)
VALUES ('김영희', 'kim@example.com', 21, 92);
```

### 1-4 SELECT - 데이터 조회

```sql
-- 모든 학생 정보 조회
SELECT * FROM students;

-- 특정 학생만 조회
SELECT name, score FROM students WHERE age = 20;

-- 조건 여러 개
SELECT * FROM students WHERE age >= 20 AND score >= 85;

-- 정렬
SELECT * FROM students ORDER BY score DESC;
```

### 1-5 UPDATE - 데이터 수정

```sql
-- 특정 학생의 성적 수정
UPDATE students SET score = 90 WHERE name = '홍길동';

-- 여러 필드 수정
UPDATE students SET score = 95, age = 21 WHERE id = 1;
```

### 1-6 DELETE - 데이터 삭제

```sql
-- 특정 학생 정보 삭제
DELETE FROM students WHERE id = 3;

-- 조건에 맞는 모든 데이터 삭제
DELETE FROM students WHERE score < 70;
```

---

## 2️⃣ PHP-MySQL 연동 방식

### 2-1 연동 방식 비교

PHP에서 MySQL 데이터베이스에 접근하는 방식은 2가지가 있습니다.

**방식 1: PDO (PHP Data Objects)**

특징:

- 여러 데이터베이스 지원 (MySQL, PostgreSQL 등)
- 더 현대적이고 안전한 방식
- 이 수업에서 사용할 방식 ✅

```php
<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=test_db',
    'root',
    'password'
);
?>
```

**방식 2: MySQLi (MySQL Improved)**

특징:

- MySQL 전용
- 절차식/객체식 모두 지원

```php
<?php
$mysqli = new mysqli('localhost', 'root', 'password', 'test_db');
?>
```

### 2-2 왜 PDO를 선택하나?

- 여러 데이터베이스 지원
- 더 안전한 Prepared Statement
- 현대적인 PHP 표준
- 예외 처리 (Exception)

---

## 3️⃣ PDO를 사용한 데이터 조회

### 3-1 기본 연결 방법

```php
<?php

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
    echo "데이터베이스 연결 성공!";
} catch (PDOException $e) {
    echo "연결 실패: " . $e->getMessage();
}

?>
```

**try-catch의 의미:**

- `try`: 시도할 코드
- `catch`: 오류 발생 시 처리할 코드

### 3-2 SELECT 데이터 조회

```php
<?php

// 모든 학생 정보 조회
$sql = "SELECT * FROM students";
$stmt = $pdo->query($sql);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $student) {
    echo $student['name'] . ": " . $student['score'] . "<br>";
}

?>
```

### 3-3 특정 데이터 조회 (검색)

```php
<?php

// 이름으로 학생 검색
$search_name = "홍길동";
$sql = "SELECT * FROM students WHERE name = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$search_name]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($student) {
    echo "찾음: " . $student['name'];
}

?>
```



### 3-4 fetch() vs fetchAll()

```php
<?php

// fetch(): 한 행만 조회
$sql = "SELECT * FROM students WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

// fetchAll(): 모든 행 조회
$sql = "SELECT * FROM students";
$stmt = $pdo->query($sql);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
```


---

## 4️⃣ SQL Injection 공격과 방어

### 4-1 SQL Injection이란?

**정의:** 악의적인 사용자가 SQL 쿼리를 조작하여 데이터를 도용하거나 손상시키는 공격입니다.

#### 위험한 예제 (절대 사용 금지!)

```php
<?php

// ⚠️ 위험한 코드 - SQL Injection에 취약
$username = $_GET['username'];

// 만약 사용자가 ' OR '1'='1 을 입력하면?
$sql = "SELECT * FROM students WHERE name = '$username'";
// 쿼리가 변조됨: SELECT * FROM students WHERE name = '' OR '1'='1'
// 결과: 모든 사용자 정보가 조회됨!

$result = $pdo->query($sql);

$students = $result->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $student) {
    echo $student['name'] . ": " . $student['score'] . "<br>";
}


?>
```

### 4-2 Prepared Statement로 방어

**원리:** 쿼리와 데이터를 분리하여 처리합니다.

```php
<?php

// ✅ 안전한 코드 - Prepared Statement 사용

$username = "' OR '1'='1";

// 1단계: 쿼리 작성 (? = 플레이스홀더)
$sql = "SELECT * FROM students WHERE name = ?";

// 2단계: 쿼리 준비
$stmt = $pdo->prepare($sql);

// 3단계: 데이터 안전하게 대입
$stmt->execute([$username]);

// 4단계: 결과 조회
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $student) {
    echo $student['name'] . ": " . $student['score'] . "<br>";
}

?>
```


### 4-3 Prepared Statement 형식들

```php
<?php

// 기본 패턴
$sql = "SELECT * FROM students WHERE score > ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([85]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// 여러 개의 플레이스홀더
$sql = "SELECT * FROM students 
        WHERE age > ? AND score < ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([20, 90]);

// 이름을 사용한 플레이스홀더 (선택사항)
$sql = "SELECT * FROM students 
        WHERE age > :age AND score < :score";
$stmt = $pdo->prepare($sql);
$stmt->execute([':age' => 20, ':score' => 90]);

?>
```


**Prepared Statement의 장점:**

- SQL Injection 방어
- 자동으로 특수문자 처리
- 가독성 향상
- 재사용 가능

### 4-4 여러 조건 검색

```php
<?php

// 나이와 성적으로 검색
$age = 21;
$min_score = 94;

$sql = "SELECT * FROM students 
        WHERE age = ? AND score >= ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$age, $min_score]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo $row['name'] . " (" . $row['score'] . "점)<br>";
}

?>
```

---

## 5️⃣ 실습 예제

### 5-1 실습 예제: 학생 정보 조회 시스템

**파일명: `student_list.php`**

```php
<?php

// 데이터베이스 연결
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

// 검색 조건 처리
$min_score = isset($_GET['score']) ? intval($_GET['score']) : 0;

$sql = "SELECT * FROM students WHERE score >= ? ORDER BY score DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$min_score]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>학생 정보 조회</title>
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
    <h1>📊 학생 정보 조회</h1>
  
    <!-- 검색 폼 -->
    <div class="search-box">
        <form method="GET">
            <label>최소 성적 이상:</label>
            <input type="number" name="score" value="<?php echo $min_score; ?>" min="0" max="100">
            <button type="submit">검색</button>
        </form>
    </div>
  
    <!-- 결과 테이블 -->
    <?php if (count($students) > 0): ?>
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
    <?php else: ?>
    <p>검색 결과가 없습니다.</p>
    <?php endif; ?>
</div>

</body>
</html>
```

---

---

## ✅ 퀴즈/과제

#### **과제 1: 기본 SQL 쿼리 작성**

다음 상황에 맞는 SQL을 작성하세요:

1. 성적이 90점 이상인 모든 학생 조회
2. 이름이 '홍'으로 시작하는 학생 조회
3. 나이 순으로 정렬하여 모든 학생 조회
4. 특정 학생의 성적을 95점으로 수정
5. 성적이 70점 미만인 학생 삭제

#### **과제 2: PHP-MySQL 연동 시스템 구축**

1. **데이터베이스 설계**

   - students 테이블 생성
   - id, name, email, age, score 필드
2. **PHP 조회 프로그램**

   - Prepared Statement로 학생 검색
   - HTML 테이블로 결과 표시
3. **검색 기능 구현**

   - 성적으로 필터링
   - 나이로 필터링
   - 복합 조건 검색
4. **오류 처리**

   - try-catch로 연결 오류 처리
   - 검색 결과가 없을 때 메시지 표시

---

## 📝 중요 포인트

### 항상 기억하기

✅ **Prepared Statement 필수**

- 모든 사용자 입력은 Prepared Statement 사용
- ? 또는 :name 플레이스홀더 사용

✅ **htmlspecialchars() 사용**

- 데이터베이스에서 가져온 데이터 출력 시 사용
- HTML 태그 인젝션 방지

✅ **오류 처리**

- try-catch로 예외 처리
- 사용자에게 친절한 오류 메시지 표시

---

수고했습니다.

조정현 교수(peterchokr@gmail.com)
영남이공대학교
