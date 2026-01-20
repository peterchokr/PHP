# 1장: 웹 개발 기초 복습 & PHP 환경 설정

---

## 학습목표

**학습목표**: 웹 개발의 기초를 다시 정리하고 PHP 개발 환경 구축

이 장을 학습하고 나면 다음을 할 수 있습니다:

✅ HTML/CSS/JavaScript의 핵심 개념을 다시 정리할 수 있습니다.
✅ MySQL의 기본 문법을 복습할 수 있습니다.
✅ PHP 개발 환경을 구축하고 설정할 수 있습니다.
✅ 첫 번째 PHP 파일을 실행하고 결과를 확인할 수 있습니다.
✅ MySQL Workbench를 사용하여 데이터베이스에 접속할 수 있습니다.

---

## 1️⃣ HTML/CSS/JavaScript 핵심 복습

### 1-1 주요 HTML 태그

웹 개발의 기초가 되는 HTML 태그들을 복습합니다.

#### **Form 태그 (사용자 입력)**

```html
<!-- 기본 form 구조 -->
<form method="POST" action="process.php">
    <input type="text" name="username" placeholder="사용자명">
    <input type="password" name="password" placeholder="비밀번호">
    <input type="submit" value="제출">
</form>
```

**주요 속성:**
- `method`: 데이터 전송 방식 (GET 또는 POST)
- `action`: 데이터를 받을 서버 파일 경로

#### **Input 태그 (다양한 입력 필드)**

```html
<input type="text" name="name" placeholder="이름">      <!-- 텍스트 -->
<input type="number" name="age" min="0" max="120">     <!-- 숫자 -->
<input type="email" name="email">                       <!-- 이메일 -->
<input type="password" name="password">                 <!-- 비밀번호 -->
<input type="checkbox" name="hobby" value="coding">    <!-- 체크박스 -->
<input type="radio" name="gender" value="male">        <!-- 라디오 버튼 -->
<input type="submit" value="제출">                      <!-- 제출 버튼 -->
```

#### **Table 태그 (표 작성)**

```html
<table border="1">
    <thead>
        <tr><th>이름</th><th>나이</th><th>직업</th></tr>
    </thead>
    <tbody>
        <tr><td>홍길동</td><td>25</td><td>개발자</td></tr>
        <tr><td>김영희</td><td>23</td><td>디자이너</td></tr>
    </tbody>
</table>
```

---

### 1-2 CSS 선택자와 스타일링 기초

```css
/* 타입 선택자 */
p { color: blue; }

/* 클래스 선택자 */
.highlight { background-color: yellow; font-weight: bold; }

/* ID 선택자 */
#header { background-color: navy; color: white; }

/* 속성 선택자 */
input[type="text"] { border: 1px solid gray; padding: 5px; }

/* 의사 클래스 */
a:hover { color: red; text-decoration: underline; }
```

**선택자 우선순위:** ID 선택자 > 클래스 선택자 > 타입 선택자

#### **기본 스타일링 속성**

```css
/* 텍스트 스타일 */
.text { color: #333; font-size: 16px; font-weight: bold; text-align: center; }

/* 박스 모델 */
.box { width: 200px; padding: 15px; margin: 10px; border: 2px solid gray; border-radius: 5px; }

/* 레이아웃 */
.flex { display: flex; justify-content: center; align-items: center; }
```

---

### 1-3 JavaScript 실습 예제 (복사해서 실행)

#### **예제 1: 간단한 폼 제출**

다음 코드를 `form_practice.html`로 저장하고 브라우저에서 열면 됩니다:

```html
<!DOCTYPE html>
<html>
<head>
    <title>폼 실습</title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 500px; margin: 50px auto; padding: 20px; }
        input { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ddd; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: navy; color: white; border: none; cursor: pointer; }
        #result { margin-top: 20px; padding: 10px; background: #e3f2fd; display: none; }
    </style>
</head>
<body>

<h2>📝 사용자 정보</h2>
<form id="myForm">
    <input type="text" id="name" placeholder="이름" required>
    <input type="email" id="email" placeholder="이메일" required>
    <button type="submit">제출</button>
</form>

<div id="result"></div>

<script>
document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    document.getElementById('result').innerHTML = `✅ 이름: ${name}, 이메일: ${email}`;
    document.getElementById('result').style.display = 'block';
    this.reset();
});
</script>

</body>
</html>
```

---

#### **예제 2: 버튼 클릭 이벤트**

다음 코드를 `button_practice.html`로 저장하세요:

```html
<!DOCTYPE html>
<html>
<head>
    <title>버튼 클릭 실습</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        button { padding: 10px 20px; margin: 10px; background: navy; color: white; border: none; cursor: pointer; }
        .box { width: 100px; height: 100px; background: red; margin-top: 20px; }
    </style>
</head>
<body>

<h2>🎨 버튼을 클릭해보세요</h2>
<button id="btn1">색상 변경</button>
<button id="btn2">크기 변경</button>
<button id="btn3">텍스트 변경</button>

<div class="box" id="box"></div>

<script>
document.getElementById('btn1').addEventListener('click', () => {
    document.getElementById('box').style.backgroundColor = 'blue';
});

document.getElementById('btn2').addEventListener('click', () => {
    document.getElementById('box').style.width = '200px';
    document.getElementById('box').style.height = '200px';
});

document.getElementById('btn3').addEventListener('click', () => {
    document.getElementById('box').textContent = '변경됨!';
});
</script>

</body>
</html>
```

---

#### **예제 3: 입력값 실시간 확인**

다음 코드를 `input_practice.html`로 저장하세요:

```html
<!DOCTYPE html>
<html>
<head>
    <title>입력값 실습</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 50px; }
        input { padding: 8px; width: 300px; font-size: 14px; }
        #output { margin-top: 20px; padding: 10px; background: #e3f2fd; min-height: 30px; }
    </style>
</head>
<body>

<h2>📝 입력값 확인</h2>
<input type="text" id="input1" placeholder="텍스트를 입력하세요...">

<div id="output">입력을 기다리는 중...</div>

<script>
document.getElementById('input1').addEventListener('input', function() {
    const value = this.value;
    const length = value.length;
    document.getElementById('output').innerHTML = `입력: ${value}<br>글자 수: ${length}`;
});
</script>

</body>
</html>
```

**3개의 파일을 각각 저장해서 브라우저에서 열어보세요!**

---

## 2️⃣ MySQL 기본 문법 복습

### 2-1 기본 SQL 문법

```sql
-- 데이터베이스 생성
CREATE DATABASE my_database;

-- 테이블 생성
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    age INT,
    email VARCHAR(100)
);

-- 데이터 삽입
INSERT INTO users (name, age, email) VALUES ('홍길동', 25, 'hong@example.com');

-- 데이터 조회
SELECT * FROM users;
SELECT name, email FROM users WHERE age > 20;

-- 데이터 수정
UPDATE users SET age = 26 WHERE name = '홍길동';

-- 데이터 삭제
DELETE FROM users WHERE id = 1;
```

---

## 3️⃣ PHP 개발 환경 설정

### 3-1 XAMPP 설치 (Windows)

1. **다운로드**: `https://www.apachefriends.org/download.html`
2. **설치**: 기본 경로 `C:\xampp` 권장
3. **실행**: XAMPP Control Panel에서 Apache와 MySQL 시작

**확인 방법:**
- `http://localhost` → "It works!" 메시지 표시 ✅
- 파일 위치: `C:\xampp\htdocs`

### 3-2 php.ini 설정

주요 설정 항목:

```ini
; 문자 인코딩
default_charset = utf-8

; 에러 표시
display_errors = On
error_reporting = E_ALL

; 파일 업로드 제한
upload_max_filesize = 20M
post_max_size = 20M

; MySQL 확장
extension=mysqli
extension=pdo_mysql
```

---

## 4️⃣ 첫 번째 PHP 파일 실행

### 4-1 "Hello, PHP World!"

파일명: `hello.php`

```php
<?php
echo "Hello, PHP World!";
?>
```

**실행 방법:**
1. 파일을 `C:\xampp\htdocs\hello.php`에 저장
2. 브라우저에서 `http://localhost/hello.php` 접속
3. "Hello, PHP World!" 메시지 확인 ✅

### 4-2 PHP 기본 출력

```php
<?php
// 변수 선언 및 출력
$name = "홍길동";
$age = 25;

echo "이름: " . $name . "<br>";
echo "나이: " . $age . "<br>";

// 배열 사용
$fruits = ["사과", "바나나", "오렌지"];
echo $fruits[0];  // 사과

// var_dump()로 변수 정보 확인
var_dump($name);  // string(12) "홍길동"
?>
```

### 4-3 PHP와 HTML 혼합

파일명: `student_list.php`

```php
<?php
$students = [
    ['name' => '홍길동', 'score' => 85],
    ['name' => '김영희', 'score' => 92],
    ['name' => '이순신', 'score' => 88]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>학생 성적</title>
    <style>
        body { font-family: '맑은 고딕'; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background: navy; color: white; }
    </style>
</head>
<body>

<h2>📊 학생 성적 관리</h2>

<table>
    <thead>
        <tr><th>이름</th><th>점수</th></tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['score']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
```

---

## 5️⃣ MySQL Workbench를 통한 데이터베이스 관리

### 5-1 MySQL Workbench 설치 및 연결

**설치:**
1. MySQL 공식 사이트에서 MySQL Workbench 다운로드
2. 설치 후 실행

**연결 설정:**
1. "MySQL Connections" 클릭
2. "+" 버튼으로 새 연결 추가
3. 설정값:
   - Connection Name: `XAMPP Local`
   - Hostname: `localhost`
   - Port: `3306`
   - Username: `root`
   - Password: (설정한 비밀번호, 기본값: 공란)
4. "Test Connection" 클릭하여 확인

### 5-2 데이터베이스 생성 및 테이블 작업

**데이터베이스 생성:**

SQL 창에서 다음 코드 입력 후 실행:

```sql
CREATE DATABASE my_database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE my_database;
```

**테이블 생성:**

```sql
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    age INT,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**데이터 삽입:**

```sql
INSERT INTO students (name, age, email) VALUES
('홍길동', 25, 'hong@example.com'),
('김영희', 23, 'kim@example.com'),
('이순신', 24, 'lee@example.com');
```

**데이터 조회:**

```sql
SELECT * FROM students;
SELECT name, email FROM students WHERE age >= 23;
```

**데이터 수정:**

```sql
UPDATE students SET age = 26 WHERE name = '홍길동';
```

**데이터 삭제:**

```sql
DELETE FROM students WHERE id = 1;
```

**MySQL Workbench의 장점:**
- ✅ 시각적 인터페이스로 테이블 구조 관리
- ✅ SQL 실행 및 결과 확인
- ✅ 데이터 직접 편집 가능
- ✅ 백업 및 내보내기 기능

---

## ✅ 퀴즈/과제

#### **과제 1: 로컬 환경 구축**

다음을 완료하세요:

1. Apache 실행 확인 (`http://localhost`)
2. `hello.php` 생성 및 실행
3. MySQL Workbench 연결 확인
4. MySQL에서 `test_db` 데이터베이스 생성

#### **과제 2: 실습 예제 완성**

1. JavaScript 3개 예제 파일 생성 및 실행
2. `student_list.php` 생성 및 실행
3. MySQL Workbench에서:
   - `students` 테이블 생성
   - 5명 이상의 학생 정보 삽입
   - 다양한 SELECT 쿼리 실행

---

수고했습니다.

조정현 교수(peterchokr@gmail.com)  
영남이공대학교
