# 📝 4장 연습문제: MySQL 복습 & PHP-MySQL 연동

---

## 🎯 객관식 10문제

#### **1번. MySQL에서 새로운 테이블을 생성하는 명령어는?**

① INSERT  
② CREATE TABLE  
③ UPDATE  
④ SELECT

---

#### **2번. 다음 SQL 쿼리의 결과는?**

```sql
SELECT name, score FROM students 
WHERE score >= 90 
ORDER BY score DESC;
```

① 90점 이상인 학생들을 성적 높은 순서로 출력  
② 모든 학생들을 이름 순서로 출력  
③ 90점 정확히 받은 학생들만 출력  
④ 90점 미만인 학생들을 출력

---

#### **3번. 다음 코드에서 ?의 역할은?**

```php
$sql = "SELECT * FROM students WHERE score > ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([85]);
```

① 와일드카드 문자  
② Prepared Statement의 플레이스홀더  
③ 선택적 매개변수  
④ 오류 표시 기호

---

#### **4번. SQL Injection이란?**

① 데이터베이스에 데이터를 주입하는 정상적인 작업  
② 악의적인 SQL 코드를 입력하여 데이터베이스를 공격하는 것  
③ 데이터베이스 백업 방식  
④ PHP에서 MySQL에 접속하는 방식

---

#### **5번. Prepared Statement의 가장 큰 장점은?**

① 더 빠른 실행 속도  
② SQL Injection 공격으로부터 안전함  
③ 더 간단한 문법  
④ 자동으로 데이터 타입 변환

---

#### **6번. PDO 연결 코드에서 ?에 들어갈 것은?**

```php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=test_db",
        "root",
        "password"
    );
} catch (?) {
    echo "연결 실패";
}
```

① SQLException  
② PDOException  
③ MySQLException  
④ DatabaseException

---

#### **7번. fetch()와 fetchAll()의 차이점은?**

① fetch()는 한 행만 조회하고, fetchAll()은 모든 행을 조회한다  
② fetch()는 여러 행을 조회하고, fetchAll()은 한 행만 조회한다  
③ fetch()는 배열을 반환하고, fetchAll()은 객체를 반환한다  
④ 기능상 차이가 없다

---

#### **8번. 다음 코드의 결과는?**

```php
$sql = "UPDATE students SET score = 95 WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
```

① id가 1인 학생의 성적을 95점으로 수정  
② 모든 학생의 성적을 95점으로 수정  
③ id가 1인 학생의 정보를 삭제  
④ 오류 발생

---

#### **9번. htmlspecialchars()의 역할은?**

① HTML 태그를 실행하지 않도록 변환  
② 문자열을 암호화  
③ 특수문자를 제거  
④ 데이터베이스 연결

---

#### **10번. 다음 코드의 실행 순서는?**

```php
$sql = "SELECT * FROM students WHERE age > ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([20]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
```

① prepare → execute → fetch  
② execute → prepare → fetch  
③ prepare → fetch → execute  
④ fetch → prepare → execute

---

## 💻 실기작업형 5문제

### **문제 1: SQL 쿼리 작성 (SELECT)**

**요구사항:**
- 학생 테이블에서 성적이 80점 이상인 학생의 이름과 성적을 조회
- 성적 높은 순서(내림차순)로 정렬
- SQL 쿼리 작성

**파일명**: `select_students.sql`

```sql
-- 여기에 SQL을 작성하세요

```

---

### **문제 2: PDO 데이터베이스 연결**

**요구사항:**
- PDO를 사용하여 MySQL 데이터베이스 연결
- try-catch로 오류 처리
- 연결 성공/실패 메시지 출력

**파일명**: `db_connect.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 3: Prepared Statement로 안전한 검색**

**요구사항:**
- 사용자가 입력한 점수 이상의 학생을 검색
- Prepared Statement 사용 (? 플레이스홀더)
- 검색 결과를 foreach로 출력
- 형식: "홍길동: 85점", "김영희: 92점"

**파일명**: `search_by_score.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 4: 여러 조건으로 복합 검색**

**요구사항:**
- 나이와 성적 두 가지 조건으로 검색
- WHERE age > ? AND score >= ? 형식의 Prepared Statement 사용
- 조건: 나이 20세 이상, 성적 80점 이상
- 검색 결과를 HTML 테이블 형식으로 출력

**파일명**: `complex_search.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: 조회 결과 표시 및 오류 처리**

**요구사항:**
- 모든 학생 정보를 조회
- 데이터베이스 연결 오류 시 try-catch로 처리
- htmlspecialchars()로 출력 값 안전 처리
- 조회 결과가 없을 때 메시지 표시
- fetch()와 fetchAll()의 사용 구분

**파일명**: `display_students.php`

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
| 1번 | **② CREATE TABLE** | CREATE TABLE은 새로운 테이블을 생성하는 명령어입니다 |
| 2번 | **① 90점 이상인 학생들을 성적 높은 순서로 출력** | WHERE score >= 90은 90점 이상, ORDER BY score DESC는 내림차순 정렬입니다 |
| 3번 | **② Prepared Statement의 플레이스홀더** | ?는 Prepared Statement에서 안전하게 데이터를 대입하기 위한 플레이스홀더입니다 |
| 4번 | **② 악의적인 SQL 코드를 입력하여 데이터베이스를 공격하는 것** | SQL Injection은 사용자 입력을 악용하여 SQL 쿼리를 조작하는 공격입니다 |
| 5번 | **② SQL Injection 공격으로부터 안전함** | Prepared Statement는 쿼리와 데이터를 분리하여 SQL Injection으로부터 방어합니다 |
| 6번 | **② PDOException** | PDO 연결 오류는 PDOException으로 처리합니다 |
| 7번 | **① fetch()는 한 행만 조회하고, fetchAll()은 모든 행을 조회한다** | fetch()는 결과의 첫 번째 행을 반환하고, fetchAll()은 모든 행을 배열로 반환합니다 |
| 8번 | **① id가 1인 학생의 성적을 95점으로 수정** | UPDATE문은 데이터를 수정하는 명령어입니다. WHERE id = 1은 id가 1인 행을 지정합니다 |
| 9번 | **① HTML 태그를 실행하지 않도록 변환** | htmlspecialchars()는 <, >, &, " 등을 HTML 엔티티로 변환하여 HTML 태그 인젝션을 방지합니다 |
| 10번 | **① prepare → execute → fetch** | 올바른 순서는 먼저 쿼리를 준비(prepare)하고, 데이터를 대입하여 실행(execute)한 후, 결과를 조회(fetch)합니다 |

---

### **실기작업형 풀이**

#### **문제 1: SQL 쿼리 작성 (SELECT) - 정답**

```sql
SELECT name, score FROM students 
WHERE score >= 80 
ORDER BY score DESC;
```

**쿼리 검증:**
- SELECT name, score: 이름과 성적만 조회 ✓
- WHERE score >= 80: 80점 이상 필터 ✓
- ORDER BY score DESC: 성적 높은 순서 정렬 ✓

---

#### **문제 2: PDO 데이터베이스 연결 - 정답**

```php
<?php
/**
 * db_connect.php - PDO 데이터베이스 연결
 */

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
    echo "✅ 데이터베이스 연결 성공!";
} catch (PDOException $e) {
    echo "❌ 연결 실패: " . $e->getMessage();
}
?>
```

**검증:**
✓ PDO 객체 생성
✓ 연결 정보 (host, dbname, user, password)
✓ try-catch로 예외 처리
✓ 성공/실패 메시지 표시

---

#### **문제 3: Prepared Statement로 안전한 검색 - 정답**

```php
<?php
/**
 * search_by_score.php - 성적으로 학생 검색
 */

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

// 검색할 최소 성적
$min_score = isset($_GET['score']) ? intval($_GET['score']) : 80;

// Prepared Statement 사용
$sql = "SELECT name, score FROM students WHERE score >= ? ORDER BY score DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$min_score]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 결과 출력
echo "<h3>성적 " . $min_score . "점 이상인 학생</h3>";
foreach ($students as $student) {
    echo $student['name'] . ": " . $student['score'] . "점<br>";
}
?>
```

**검증:**
✓ Prepared Statement (? 플레이스홀더)
✓ $min_score 변수로 안전한 데이터 대입
✓ fetchAll()로 모든 결과 조회
✓ foreach로 결과 출력

---

#### **문제 4: 여러 조건으로 복합 검색 - 정답**

```php
<?php
/**
 * complex_search.php - 나이와 성적으로 복합 검색
 */

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

// 검색 조건
$min_age = 20;
$min_score = 80;

// 여러 조건의 Prepared Statement
$sql = "SELECT * FROM students 
        WHERE age > ? AND score >= ? 
        ORDER BY score DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$min_age, $min_score]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>복합 검색</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: navy; color: white; }
    </style>
</head>
<body>

<h1>나이 20세 이상, 성적 80점 이상인 학생</h1>

<table>
    <thead>
        <tr>
            <th>이름</th>
            <th>나이</th>
            <th>성적</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo $student['age']; ?></td>
            <td><?php echo $student['score']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
```

**검증:**
✓ 두 개의 플레이스홀더 (?, ?)
✓ execute([값1, 값2]) 형식
✓ AND로 여러 조건 결합
✓ HTML 테이블로 결과 표시

---

#### **문제 5: 조회 결과 표시 및 오류 처리 - 정답**

```php
<?php
/**
 * display_students.php - 모든 학생 조회 및 오류 처리
 */

$host = 'localhost';
$dbname = 'test_db';
$user = 'root';
$password = '';

$pdo = null;

try {
    // 데이터베이스 연결
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $password
    );
    
    // 모든 학생 조회
    $sql = "SELECT id, name, email, age, score FROM students ORDER BY score DESC";
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // 연결 오류 처리
    echo "❌ 데이터베이스 오류: " . htmlspecialchars($e->getMessage());
    $students = array();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>학생 정보</title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 900px; margin: 30px auto; }
        h1 { color: navy; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: navy; color: white; padding: 12px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f5f5f5; }
        .no-data { color: red; padding: 20px; }
    </style>
</head>
<body>

<h1>📊 전체 학생 정보</h1>

<?php if (count($students) > 0): ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>이름</th>
            <th>이메일</th>
            <th>나이</th>
            <th>성적</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
            <td><?php echo $student['age']; ?></td>
            <td><?php echo $student['score']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>

<p class="no-data">조회 결과가 없습니다.</p>

<?php endif; ?>

</body>
</html>
```

**검증:**
✓ try-catch로 연결 오류 처리
✓ fetchAll()로 모든 행 조회
✓ htmlspecialchars()로 안전한 출력
✓ 결과가 없을 때 메시지 표시
✓ 정보 표시 vs 오류 처리 구분

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **SQL 문법**: SELECT, INSERT, UPDATE, DELETE의 역할 구분
2. **Prepared Statement**: ? 플레이스홀더와 execute()의 관계
3. **보안**: SQL Injection과 htmlspecialchars()의 역할
4. **PDO 메서드**: fetch() vs fetchAll(), prepare() vs query()

### **실기작업형 풀이 전략**

1. **SQL 작성**: WHERE, ORDER BY 등 필터링과 정렬
2. **PDO 연결**: try-catch로 예외 처리
3. **Prepared Statement**: 플레이스홀더로 안전한 데이터 대입
4. **결과 처리**: fetchAll()로 여러 행, fetch()로 한 행
5. **보안**: htmlspecialchars()로 출력 값 안전 처리

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수(peterchokr@gmail.com)  
영남이공대학교

