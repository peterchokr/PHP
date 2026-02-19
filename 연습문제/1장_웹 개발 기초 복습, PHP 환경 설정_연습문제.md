# 📝 1장 연습문제: 웹 개발 기초 복습 & PHP 환경 설정

---

## 🎯 객관식 10문제

#### **1번. HTML Form 태그에서 method="POST"를 사용하는 주된 이유는?**

① 데이터를 URL에 표시하여 빠르게 전송한다  
② 데이터를 요청 본문에 포함하여 보안성이 높고 용량 제한이 없다  
③ 이미지나 파일을 서버로 전송할 수 없다  
④ 브라우저 캐시에 저장되어 로딩이 빨라진다

---

#### **2번. 다음 중 입력 필드에서 여러 항목 중 1개만 선택할 수 있는 input 타입은?**

① `<input type="checkbox">`  
② `<input type="radio">`  
③ `<input type="select">`  
④ `<input type="text">`

---

#### **3번. CSS 선택자의 우선순위를 높은 순서대로 바르게 정렬한 것은?**

① 타입 선택자 > 클래스 선택자 > ID 선택자  
② ID 선택자 > 클래스 선택자 > 타입 선택자  
③ 클래스 선택자 > ID 선택자 > 타입 선택자  
④ 세 선택자의 우선순위는 모두 같다

---

#### **4번. JavaScript에서 ID가 "myButton"인 요소를 선택하는 올바른 방법은?**

① `document.selectElementById('myButton')`  
② `document.getElementById('myButton')`  
③ `document.getID('myButton')`  
④ `element.getElementById('myButton')`

---

#### **5번. addEventListener의 역할로 올바른 것은?**

① HTML 요소를 삭제한다  
② 요소에 이벤트(클릭, 마우스 움직임 등)를 감지하도록 등록한다  
③ CSS 스타일을 요소에 적용한다  
④ 폼 데이터를 서버로 전송한다

---

#### **6번. PHP에서 echo와 print의 차이점은?**

① echo는 여러 인자를 쉼표로 구분하여 전달 가능, print는 하나만 가능  
② print는 여러 인자 가능, echo는 하나만 가능  
③ echo는 속도가 느리고 print는 빠르다  
④ 기능상 차이가 없고 문법만 다르다

---

#### **7번. PHPMyAdmin의 역할로 가장 적합한 것은?**

① PHP 코드를 편집하고 실행한다  
② MySQL 데이터베이스를 웹 브라우저에서 관리한다  
③ Apache 웹 서버를 제어한다  
④ JavaScript 코드를 디버깅한다

---

#### **8번. 다음 JavaScript 코드의 실행 결과는?**

```javascript
const element = document.getElementById('myDiv');
element.textContent = '<strong>굵은 텍스트</strong>';
```

① 화면에 "**굵은 텍스트**"가 표시된다 (굵은 형식 적용됨)  
② 화면에 "<strong>굵은 텍스트</strong>"라는 텍스트가 그대로 표시된다  
③ HTML 태그가 해석되어 굵은 텍스트가 표시된다  
④ 요소가 삭제되고 아무것도 표시되지 않는다

---

#### **9번. 다음 HTML/CSS 코드에서 텍스트의 최종 색상은?**

```html
<style>
    p { color: green; }
    .highlight { color: blue; }
    #special { color: red; }
</style>

<p class="highlight" id="special">테스트</p>
```

① green  
② blue  
③ red  
④ 세 색상이 모두 번갈아 표시된다

---

#### **10번. MySQL에서 다음 테이블 구조가 주어졌을 때, 올바른 해석은?**

```sql
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    age INT,
    grade DECIMAL(3,2)
);
```

① 같은 이메일을 가진 학생을 2명 이상 등록할 수 있다  
② name 컬럼은 반드시 값이 있어야 하고, email은 중복되지 않아야 한다  
③ grade 컬럼은 정수값만 저장할 수 있다  
④ id 컬럼은 수동으로 값을 입력해야 한다

---

## 💻 실기작업형 5문제

### **문제 1: HTML Form 생성 (HTML)**

**요구사항:**
- 회원가입 폼을 만드세요
- 필드: 이름(텍스트), 이메일(이메일), 비밀번호(비밀번호), 약관동의(체크박스), 제출 버튼
- CSS를 이용해 기본적인 스타일 적용 (배경색, 여백, 테두리 등)

**파일명**: `signup.html`

```html
<!-- 여기에 작성하세요 -->

```

---

### **문제 2: CSS 스타일링 (CSS)**

**요구사항:**
- 다음 HTML을 CSS로 꾸미세요
- ID 선택자로 `#title` (파란색, 중앙정렬, 크기 24px)
- 클래스 선택자로 `.highlight` (노란색 배경, 굵은 텍스트)
- 타입 선택자로 `p` 태그 (회색 텍스트색)

```html
<h1 id="title">제목</h1>
<p>일반 단락입니다.</p>
<p class="highlight">강조된 단락입니다.</p>
```

**작성 내용**:
```css
/* 여기에 CSS를 작성하세요 */

```

---

### **문제 3: JavaScript DOM 조작**

**요구사항:**
- 버튼을 클릭하면 `<div id="message">`의 내용이 "버튼이 클릭되었습니다!"로 변경
- 버튼을 다시 클릭하면 원래 내용으로 복원
- 버튼 클릭 시 텍스트 색상이 빨간색으로 변경

**HTML:**
```html
<button id="myButton">클릭하세요</button>
<div id="message">원래 메시지입니다</div>
```

**JavaScript 작성:**
```javascript
// 여기에 코드를 작성하세요

```

---

### **문제 4: PHP 기본 프로그램**

**요구사항:**
- 이름, 수학점수, 국어점수를 변수에 저장
- 두 점수의 평균을 계산
- echo로 "이름: 홍길동, 평균: 90.5점" 형식으로 출력

**파일명**: `student.php`

```php
<?php
// 여기에 코드를 작성하세요

?>
```

---

### **문제 5: PHP로 HTML 테이블 생성**

**요구사항:**
- PHP 배열에 다음 3명의 학생 정보 저장: (이름, 수학, 과학)
  - 김철수: 수학 85, 과학 90
  - 이영희: 수학 92, 과학 88
  - 박민준: 수학 78, 과학 95
- PHP 반복문으로 HTML 테이블을 동적으로 생성
- 테이블 형식: 이름 | 수학 | 과학 | 합계

**파일명**: `score_table.php`

```php
<?php
/**
 * score_table.php
 * 
 * 요구사항:
 * 1. 배열에 학생 데이터 저장
 * 2. foreach 반복문으로 각 학생 처리
 * 3. echo로 HTML 테이블 생성
 */

// 여기에 코드를 작성하세요

?>
```

---

---

## ✅ 정답 및 풀이

### **객관식 정답**

| 문제 | 정답 | 풀이 |
|------|------|------|
| 1번 | **② POST** | POST는 데이터를 요청 본문에 포함하여 전송하므로 보안성이 높고 용량 제한이 없습니다 |
| 2번 | **② radio** | 라디오 버튼(radio)은 여러 항목 중 1개만 선택 가능합니다. 체크박스는 여러 개 선택 가능 |
| 3번 | **② ID > 클래스 > 타입** | CSS 선택자 우선순위: ID(100) > 클래스(10) > 타입(1) |
| 4번 | **② getElementById()** | JavaScript에서 ID로 요소를 선택할 때 `getElementById()` 메서드를 사용합니다 |
| 5번 | **② 이벤트 감지 등록** | addEventListener는 요소에 이벤트 리스너를 등록하여 특정 이벤트를 감지합니다 |
| 6번 | **① echo는 여러 인자, print는 하나** | echo는 쉼표로 구분하여 여러 인자 전달 가능, print는 하나만 가능합니다 |
| 7번 | **② MySQL 관리** | PHPMyAdmin은 웹 브라우저에서 MySQL 데이터베이스를 관리할 수 있는 도구입니다 |
| 8번 | **② 텍스트로 표시** | textContent는 HTML 태그를 해석하지 않고 그대로 텍스트로 표시합니다 |
| 9번 | **③ red** | ID 선택자(#special)가 클래스 선택자(.highlight)와 타입 선택자(p)보다 우선순위가 높습니다 |
| 10번 | **② name은 필수, email은 중복 불가** | NOT NULL은 필수 입력, UNIQUE는 중복 불가를 의미합니다 |

---

### **실기작업형 풀이**

#### **문제 1: HTML Form 생성 - 정답**

```html
<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
    <style>
        body {
            font-family: '맑은 고딕', sans-serif;
            max-width: 400px;
            margin: 50px auto;
        }
        
        .form-container {
            background: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        
        input[type="checkbox"] {
            margin-top: 10px;
        }
        
        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: navy;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }
        
        button:hover {
            background: #00008b;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>회원가입</h2>
    
    <form method="POST" action="process.php">
        <label for="name">이름</label>
        <input type="text" id="name" name="name" placeholder="이름을 입력하세요">
        
        <label for="email">이메일</label>
        <input type="email" id="email" name="email" placeholder="이메일을 입력하세요">
        
        <label for="password">비밀번호</label>
        <input type="password" id="password" name="password" placeholder="비밀번호를 입력하세요">
        
        <label>
            <input type="checkbox" name="agree" value="yes"> 약관에 동의합니다
        </label>
        
        <button type="submit">가입하기</button>
    </form>
</div>

</body>
</html>
```

---

#### **문제 2: CSS 스타일링 - 정답**

```css
#title {
    color: blue;
    text-align: center;
    font-size: 24px;
}

.highlight {
    background-color: yellow;
    font-weight: bold;
}

p {
    color: gray;
}
```

---

#### **문제 3: JavaScript DOM 조작 - 정답**

```javascript
const button = document.getElementById('myButton');
const message = document.getElementById('message');
const originalText = "원래 메시지입니다";
let isClicked = false;

button.addEventListener('click', function() {
    if (isClicked) {
        // 원래 상태로 복원
        message.textContent = originalText;
        message.style.color = 'black';
        isClicked = false;
    } else {
        // 변경된 상태로
        message.textContent = '버튼이 클릭되었습니다!';
        message.style.color = 'red';
        isClicked = true;
    }
});
```

---

#### **문제 4: PHP 기본 프로그램 - 정답**

```php
<?php
// 학생 정보 저장
$name = "홍길동";
$math = 90;
$korean = 91;

// 평균 계산
$average = ($math + $korean) / 2;

// 결과 출력
echo "이름: " . $name . ", 평균: " . $average . "점";
// 또는
// printf("이름: %s, 평균: %.1f점", $name, $average);
?>
```

**출력 결과:**
```
이름: 홍길동, 평균: 90.5점
```

---

#### **문제 5: PHP로 HTML 테이블 생성 - 정답**

```php
<?php
/**
 * score_table.php
 * 
 * 학생 점수를 배열에 저장하고
 * 반복문으로 HTML 테이블 생성
 */

// 1️⃣ 학생 데이터 배열
$students = array(
    array('name' => '김철수', 'math' => 85, 'science' => 90),
    array('name' => '이영희', 'math' => 92, 'science' => 88),
    array('name' => '박민준', 'math' => 78, 'science' => 95)
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>학생 성적</title>
    <style>
        body {
            font-family: '맑은 고딕', sans-serif;
            max-width: 600px;
            margin: 30px auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        thead {
            background-color: navy;
            color: white;
        }
        
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<h1>학생 성적표</h1>

<table>
    <thead>
        <tr>
            <th>이름</th>
            <th>수학</th>
            <th>과학</th>
            <th>합계</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // 2️⃣ 반복문으로 각 학생 정보 처리
        foreach ($students as $student) {
            $total = $student['math'] + $student['science'];
            
            // 3️⃣ HTML 테이블 행 생성
            echo "<tr>";
            echo "<td>" . $student['name'] . "</td>";
            echo "<td>" . $student['math'] . "</td>";
            echo "<td>" . $student['science'] . "</td>";
            echo "<td>" . $total . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
```

**출력 결과:**

| 이름 | 수학 | 과학 | 합계 |
|------|------|------|------|
| 김철수 | 85 | 90 | 175 |
| 이영희 | 92 | 88 | 180 |
| 박민준 | 78 | 95 | 173 |

---

## 💡 풀이 팁

### **객관식 풀이 전략**

1. **문제를 2번 읽기**: 첫 번째는 전체 이해, 두 번째는 정답 선택
2. **선택지 하나씩 검토**: "이것이 정말 맞나?" 확인
3. **정답이 확실하지 않으면 제외법**: 명백히 틀린 선택지를 먼저 제외

### **실기작업형 풀이 전략**

1. **요구사항 정확히 이해**: 요구사항을 다시 읽고 체크리스트 만들기
2. **기본부터 시작**: 복잡한 기능보다 기본 구조를 먼저 완성
3. **테스트**: 각 단계마다 작동 확인
4. **주석 추가**: 코드의 목적과 동작을 설명하는 주석

---

**수고했습니다! 화이팅! 💪**

---

조정현 교수(peterchokr@gmail.com)  
영남이공대학교

