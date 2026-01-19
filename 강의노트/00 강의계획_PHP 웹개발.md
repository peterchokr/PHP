# PHP 웹 개발 수업 13장 커리큘럼

## 📋 수업 개요

- **학년**: 2학년 (HTML, CSS, JavaScript, MySQL 기초 이수)
- **총 강의시간**: 13장 × 3시간 = 39시간
- **시간 배분**: 강의 70%, 실습 30%
- **목표**:
  - 기본 단계(60%, 1-8장): PHP 기초 + MySQL 연계 서비스 개발 이해
  - 실무 단계(40%, 9-13장): 게시판 구현으로 실무 개발 능력 양성
  - 프로젝트(기말): 실제 구현으로 개발 능력 심화

---

## 📅 장별 상세 커리큘럼

### **1장: 웹 개발 기초 복습 & PHP 환경 설정**

**학습목표**: 웹 개발의 기초를 다시 정리하고 PHP 개발 환경 구축

**강의내용**

- HTML/CSS/JavaScript 핵심 복습
  - 주요 HTML 태그 (form, input, table)
  - CSS 선택자와 스타일링 기초
  - JavaScript DOM 조작 (getElementById, addEventListener)
- MySQL 기초 복습
  - CREATE TABLE, INSERT, SELECT, WHERE 문법
  - 기본 JOIN 개념
  - 데이터 타입 (INT, VARCHAR, DATE)
- PHP 환경 설정
  - Apache, PHP, MySQL 설치 확인
  - php.ini 기본 설정
  - 첫 번째 PHP 파일 실행 및 출력 확인

**실습 내용**

- 로컬 환경(Apache + PHP + MySQL)에서 간단한 PHP 파일 실행
- "Hello, PHP World!" 출력
- PHPMyAdmin을 통한 데이터베이스 접속 확인

---

### **2장: PHP 기초 문법 & 변수, 데이터 타입**

**학습목표**: PHP 문법의 기초를 이해하고 변수와 데이터 타입을 활용할 수 있음

**강의내용**

- PHP 기본 문법
  - PHP 태그 (`<?php ?>`)
  - echo와 print 문의 차이
  - var_dump()를 통한 변수 확인
  - 주석 작성 (// /* */)
- 변수와 상수
  - 변수 선언 규칙 ($변수명)
  - 동적 타입 시스템
  - 상수 정의 (define, const)
- 데이터 타입
  - String (문자열), Integer, Float
  - Boolean, Array, Object, NULL
  - gettype(), settype() 함수
- 연산자
  - 산술 연산자 (+, -, *, /, %)
  - 논리 연산자 (&&, ||, !)
  - 비교 연산자 (==, ===, !=, !==)
  - 문자열 연결 (.)

**실습 내용**

- 변수 선언 및 출력
- 다양한 데이터 타입 선언 및 var_dump() 확인
- 사용자 입력(GET/POST) 받아서 변수에 저장 후 출력
- 간단한 계산기: 두 수를 입력받아 합계 출력

---

### **3장: 조건문, 반복문 & 함수**

**학습목표**: 제어 흐름을 이해하고 함수를 정의 및 활용할 수 있음

**강의내용**

- 조건문
  - if / else / elseif 문
  - switch 문과 case 구조
  - 삼항 연산자 (? :)
- 반복문
  - for 루프 (초기값, 조건, 증감)
  - foreach 루프 (배열 순회)
  - while / do-while 루프
  - break, continue 제어
- 함수
  - 함수 정의 (function 키워드)
  - 매개변수와 반환값
  - 함수 스코프 (global 키워드)
  - 재귀 함수 개념
- 내장 함수 활용
  - 문자열 함수: strlen(), substr(), strpos(), strtoupper()
  - 배열 함수: count(), array_push(), array_pop(), in_array()
  - 수학 함수: abs(), round(), max(), min()

**실습 내용**

- 회원가입 유효성 검사 로직 작성
  - 아이디 길이 체크 (5자 이상)
  - 비밀번호 일치 확인
  - 이메일 형식 확인
- 구구단 출력 (중첩 for 루프)
- 배열에서 특정 값 찾기 (foreach)
- 함수 사용: 온도 변환, 평균 계산 등

---

### **4장: MySQL 복습 & PHP-MySQL 연동**

**학습목표**: PHP에서 MySQL 데이터베이스에 접근하고 안전하게 데이터를 처리할 수 있음

**강의내용**

- MySQL 복습
  - CREATE TABLE (테이블 생성, 필드 정의)
  - INSERT (데이터 삽입)
  - SELECT (데이터 조회)
  - UPDATE (데이터 수정)
  - DELETE (데이터 삭제)
  - WHERE 절을 통한 조건 지정
- PHP에서 MySQL 연동 방식 비교
  - PDO (PHP Data Objects) 소개 및 예제
    ```
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'user', 'password');
    ```
  - MySQLi (MySQL Improved) 소개 및 예제
    ```
    $mysqli = new mysqli('localhost', 'user', 'password', 'test');
    ```
  - 두 방식의 장단점 비교 (실제 코드로 보여주기)
    - PDO: 여러 DB 지원, 더 현대적인 문법
    - MySQLi: MySQL 전용, 절차식/객체식 모두 지원
  - **결론**: 이 수업에서는 PDO 사용하기로 결정
- SQL Injection 공격과 방어
  - SQL Injection이란? (악의적인 사용자가 쿼리 조작)
  - Prepared Statement (매개변수화된 쿼리)의 필요성과 작동 원리
  - 플레이스홀더 (?) 사용 방법 (구체적인 실습)

**실습 내용**

- 데이터베이스 및 테이블 생성
  - students 테이블 (id, name, email, age, score)
- PHP에서 학생 정보 조회 (PDO 사용)
  - 전체 학생 목록 조회 및 HTML 표로 표시
  - Prepared Statement를 사용한 조회 (플레이스홀더 ? 사용)
- 안전한 검색 기능
  - Prepared Statement를 사용하지 않은 경우와 사용한 경우 비교
  - 왜 Prepared Statement가 필요한지 이해

---

### **5장: 폼 처리 & GET/POST 요청**

**학습목표**: 사용자 입력을 받고 기본적으로 검증하여 안전하게 처리할 수 있음

**강의내용**

- 폼 기초 복습
  - HTML form 태그
  - method="GET" vs method="POST" 차이 이해
  - input, textarea, select 요소
- PHP 폼 처리 (기초)
  - $_POST 변수 배열로 폼 데이터 수신
  - $_GET 변수 배열 이해 (사용은 POST 중심)
  - form 데이터 수신 및 확인
- 기본 데이터 검증
  - 필드 필수 확인 (empty, isset 함수)
  - 문자열 길이 확인 (strlen 함수)
  - 이메일 형식 간단히 확인 (문자 + @ + 문자)
  - 숫자 확인 (is_numeric 함수)
- 데이터 안전성 처리 (기초)
  - htmlspecialchars 함수 (HTML 특수문자 변환) - 간단한 소개
  - 나머지 보안 개념은 6장에서 함께 다룰 예정

**실습 내용**

- 간단한 검색 폼 제작
  - 검색어 입력 필드 (1개만)
  - $_POST로 검색어 수신
  - 필수 입력 확인 (비어있으면 "검색어를 입력하세요")
  - 검색어가 있으면 학생 테이블에서 이름으로 검색하여 표시
- 기본적인 에러 메시지 표시
  - 검색 결과가 없으면 "검색 결과가 없습니다" 출력

---

### **6장: 세션(Session) & 쿠키(Cookie) & 로그인 시스템**

**학습목표**: 세션과 쿠키를 이해하고, 기본적인 로그인/로그아웃 기능을 구현할 수 있음

**강의내용**

- 세션의 개념과 작동 원리
  - 세션이란? (서버에 사용자 정보 저장)
  - session_start() 함수 사용
  - $_SESSION 배열에 데이터 저장
  - 세션 종료 (session_destroy)
- 쿠키의 개념 (기초)
  - 쿠키란? (클라이언트에 정보 저장)
  - setcookie() 함수 사용 (간단한 소개)
  - 쿠키 vs 세션 이해
- 로그인/로그아웃 시스템 (기초)
  - 사용자 인증 프로세스 (아이디, 비밀번호 확인)
  - 비밀번호 검증: password_verify 함수 사용
  - 로그인 성공 → $_SESSION에 user_id, username 저장
  - 로그아웃 → 세션 삭제
- 보안 고려사항 (주요 2가지 설명)
  - 비밀번호 해싱의 중요성 (password_hash, password_verify 왜 필요한가)
  - 로그인 확인: 페이지 접근 전 세션 확인 (if(isset($_SESSION['user_id'])))
  - 나머지 보안 (CSRF, XSS, 세션 하이재킹)은 과제에서 학습

**실습 내용**

- 기본 로그인 시스템 (간단하게)
  - login.php: 로그인 폼
    - 아이디, 비밀번호 입력 필드 (2개만)
  - 사용자 테이블에서 아이디로 사용자 검색
  - password_verify()로 비밀번호 확인
  - 인증 성공 → $_SESSION['user_id'], $_SESSION['username'] 저장
  - 인증 실패 → "아이디 또는 비밀번호가 잘못되었습니다"
- 로그아웃 기능
  - logout.php: 세션 삭제, 로그인 페이지로 이동
- 간단한 마이페이지
  - 로그인된 사용자만 접근 가능
  - 사용자의 이름 표시
  - 로그아웃 버튼

---

### **7장: 파일 업로드 & 에러 처리**

**학습목표**: 파일 업로드의 원리를 이해하고, 기본적인 검증과 에러 처리를 할 수 있음

**강의내용**

- 파일 업로드 기초
  - HTML form에서 enctype="multipart/form-data" 설정
  - $_FILES 배열 구조 이해
    - $_FILES['filename']['name']: 원본 파일명
    - $_FILES['filename']['type']: MIME 타입
    - $_FILES['filename']['size']: 파일 크기
    - $_FILES['filename']['tmp_name']: 임시 경로
    - $_FILES['filename']['error']: 에러 코드
  - move_uploaded_file() 함수로 파일 저장
- 기본 파일 검증
  - 파일이 실제로 업로드되었는지 확인
  - 파일 크기 제한 확인
  - 파일 확장자 확인 (간단하게: .jpg, .png만 허용)
  - 파일명 안전 처리 (타임스탬프 + 원본명)
- 에러 처리 (기초)
  - try-catch 블록으로 업로드 예외 처리
  - 사용자에게 친화적인 오류 메시지 제공
  - die(), exit() 함수로 스크립트 중단
- 디버깅 기법 (간단 소개)
  - var_dump(), print_r()로 변수 확인
  - error_log() 함수 (선택사항)

**실습 내용**

- 간단한 이미지 업로드 (원리 이해 중심)
  - 파일 선택 폼 제작 (1개 파일만)
  - $_FILES 배열 확인 및 출력
  - 이미지 파일만 허용 (.jpg, .png)
  - 파일 크기 2MB 이하로 제한
  - uploads/ 폴더에 안전한 파일명으로 저장
  - 업로드 결과 표시 (성공/실패 메시지)

---

### **8장: 데이터 관리 & 종합 실습 (1차 프로젝트)**

**학습목표**: 지난 7주간 배운 내용을 통합하여 기본적인 웹 애플리케이션을 개발할 수 있음

**강의 내용  - 두 프로젝트 중 하나 선택하여 진행**

**선택 1: 간단한 TODO 관리 시스템**

*강의에서 함께 구현할 부분:*

- 데이터베이스 설계: todos 테이블 (id, user_id, title, status, created_at)
- TODO 추가 기능
  - 제목 입력 폼
  - 로그인된 사용자의 user_id와 함께 INSERT
  - 완료 후 목록 페이지로 이동
- TODO 목록 조회 및 출력
  - 로그인된 사용자의 TODO만 표시
  - 최신순으로 정렬
  - 제목, 상태(완료/미완료), 생성일 표시
- TODO 수정 기능
  - TODO 제목 수정 폼
  - 기존 데이터 폼에 미리 채우기 (SELECT)
  - UPDATE 쿼리로 데이터 수정
  - 수정 완료 후 목록으로 돌아가기

*과제로 확장할 부분 :*

- 단계 1: TODO 상태 변경 (완료/미완료)
  - status 컬럼 UPDATE (간단한 토글 버튼)
- 단계 2: TODO 삭제하기
  - 삭제 버튼 클릭 시 확인 메시지
  - DELETE 쿼리로 삭제
- 선택사항: 페이지네이션 추가 (1페이지에 5개 표시)

---

**선택 2: 간단한 상품 관리 시스템 (관리자용)**

*강의에서 함께 구현할 부분 :*

- 데이터베이스 설계: products 테이블 (id, name, price, stock, created_at)
- 상품 추가 기능
  - 상품명, 가격, 재고 입력 폼
  - 로그인 확인 (관리자만 가능)
  - INSERT로 데이터베이스 저장
  - 완료 후 목록 페이지로 이동
- 상품 목록 조회 및 출력
  - 모든 상품 표시
  - 상품명, 가격, 재고, 생성일 표시
  - 최신순으로 정렬
  - 각 상품마다 수정, 삭제 버튼 표시
- 상품 수정 기능
  - 상품 수정 폼
  - 기존 데이터 폼에 미리 채우기 (SELECT)
  - UPDATE 쿼리로 데이터 수정
  - 수정 완료 후 목록으로 돌아가기

*과제로 확장할 부분:*

- 단계 1: 상품 삭제하기
  - 삭제 버튼 클릭 시 확인 메시지
  - DELETE 쿼리로 삭제
- 단계 2: 상품 검색하기
  - 상품명으로 검색하는 검색 폼 추가
  - LIKE 연산자로 부분 검색
- 선택사항: 이미지 업로드 (7장에서 학습한 파일 업로드 기능 적용)

---

**강의 진행 방식**

1. 선택한 프로젝트 1개 선택 (학생의 학습 수준에 따라 강사가 결정)
2. 강의 시간에는 데이터베이스 설계부터 수정 기능까지 모두 구현
3. 과제에서는 삭제, 상태 변경, 검색 등 추가 기능을 구현하면서 능력 확장

---

### **9장: 게시판 시스템 구현 (1/5) - 게시글 CRUD**

**학습목표**: 데이터베이스 설계부터 CRUD 기능까지 구현하여 게시판의 기본을 이해할 수 있음

**강의 전개 방식**

- 📌 **무엇을 만드나요?** 게시판 시스템 (사람들이 글을 올리고 공유하는 기능)
- 📌 **왜 필요한가요?** 정보 공유, 사용자 상호작용, 커뮤니티 형성
- 📌 **어떻게 만드나요?** DB 설계 → CRUD 구현 → 검색/페이지네이션 추가

**강의내용**

- 게시판 데이터베이스 설계
  - posts 테이블: id, user_id, title, content, views, created_at, updated_at
  - 필드 설명 및 데이터 타입 (INT, VARCHAR, TEXT, TIMESTAMP)
  - FOREIGN KEY (user_id) 외래키 개념
  - 1:N 관계 시각화 (사용자 1 ↔ 게시글 N)
- 게시글 CRUD 구현
  - Create (작성): write.php - 새 글 작성
  - Read (조회): list.php (목록), view.php (상세) - 글 보기
  - Update (수정): edit.php - 자신의 글 수정 (작성자 확인)
  - Delete (삭제): delete.php - 자신의 글 삭제
- 페이지네이션
  - LIMIT과 OFFSET 사용법
  - 1페이지에 10개 표시 (LIMIT 10 OFFSET 0)
  - 페이지 네비게이션 UI
  - 게시글 총 개수 계산
- 조회수 관리
  - 게시글 열 때마다 조회수 증가
  - UPDATE posts SET views = views + 1
- 기본 검색 기능
  - 제목으로 검색 (LIKE %검색어%)
  - 작성자로 검색 (JOIN users)

**실습 내용**

- 데이터베이스 및 테이블 생성
  - board_db 데이터베이스 생성
  - posts 테이블 생성 (필드, 제약 조건)
  - 샘플 데이터 삽입
- 게시글 작성 기능
  - write.php: 입력 폼
  - 제목, 내용 입력 받기
  - 데이터 저장 (INSERT)
- 게시글 목록 및 조회
  - list.php: 게시글 목록 표시 (페이지네이션 포함)
  - view.php: 게시글 상세 정보 + 조회수 증가
  - 작성자 정보 표시 (JOIN)
- 게시글 수정 및 삭제
  - edit.php: 기존 내용 조회 후 수정 (작성자만)
  - delete.php: 삭제 (확인 메시지)
- 기본 검색
  - 제목/작성자 검색 폼
  - 검색 결과 페이지네이션

---

### **10장: 게시판 시스템 구현 (2/5) - 댓글 기능**

**학습목표**: 1:N 관계를 이해하고 댓글 시스템을 구현할 수 있음

**강의 전개 방식**

- 📌 **무엇을 만드나요?** 댓글 시스템 (게시글에 의견을 달 수 있는 기능)
- 📌 **왜 필요한가요?** 사용자 간 상호작용 증진, 피드백 수집, 커뮤니티 활성화
- 📌 **어떻게 만드나요?** DB 설계 → 댓글 CRUD 구현 → view.php에 표시

**강의내용**

- 댓글 데이터베이스 설계
  - comments 테이블: id, post_id, user_id, content, created_at, updated_at
  - posts ↔ comments (1:N 관계) 시각화
  - FOREIGN KEY CASCADE 개념
- 댓글 CRUD 구현
  - Create (작성): add_comment.php - 댓글 추가
  - Read (조회): view.php 수정 - 댓글 표시
  - Update (수정): edit_comment.php - 댓글 수정 (작성자만)
  - Delete (삭제): delete_comment.php - 댓글 삭제 (작성자만)
- 보안: 작성자 확인
  - WHERE id = ? AND user_id = ? 패턴
  - 본인의 댓글만 수정/삭제 가능
- JOIN을 이용한 작성자 정보 조회

**실습 내용**

- comments 테이블 생성
- add_comment.php: 댓글 작성
  - 댓글 입력 폼
  - htmlspecialchars로 보안 처리
  - 로그인 확인
- view.php 수정: 댓글 표시
  - JOIN으로 작성자 정보 함께 조회
  - 최신순 정렬
  - 본인의 댓글만 수정/삭제 버튼 표시
- edit_comment.php: 댓글 수정 (작성자만)
- delete_comment.php: 댓글 삭제 (작성자만)

---

### **11장: 게시판 시스템 구현 (3/5) - 파일 첨부**

**학습목표**: 파일 업로드를 안전하게 처리하고 파일 첨부 시스템을 구현할 수 있음

**강의 전개 방식**

- 📌 **무엇을 만드나요?** 파일 첨부 시스템 (게시글에 파일을 올릴 수 있는 기능)
- 📌 **왜 필요한가요?** 이미지, 문서 공유, 자료 보관
- 📌 **어떻게 만드나요?** 파일 검증 → 안전한 저장 → 다운로드 기능

**강의내용**

- 파일 첨부 데이터베이스 설계
  - attachments 테이블: id, post_id, original_name, stored_name, file_size, created_at
  - 원본 파일명 vs 저장된 파일명 (보안, 충돌 방지)
- 파일 검증
  - 파일 크기 제한 (10MB)
  - 확장자 검증 (jpg, png, pdf, doc, docx, txt)
  - pathinfo()로 확장자 추출
- 안전한 파일명 생성
  - time() + post_id + basename
  - 특수문자/한글 제거
- 파일 다운로드
  - 원본 파일명으로 사용자에게 제공
  - readfile()로 파일 전송

**실습 내용**

- attachments 테이블 생성
- upload_file.php 함수 정의
  - 파일 크기 검증
  - 확장자 검증
  - 안전한 파일명 생성
  - 파일 저장
- write.php 수정
  - enctype="multipart/form-data"
  - 여러 파일 업로드
  - uploadFile() 함수 호출
- view.php 수정
  - 첨부 파일 목록 표시
  - 다운로드 링크
- download.php: 파일 다운로드
  - HTTP 헤더 설정
  - readfile()로 전송
- delete_attachment.php: 파일 삭제

---

### **12장: 게시판 고급 기능 (1/3) - 태그 시스템**

**학습목표**: 다대다 관계를 이해하고 태그 시스템을 구현할 수 있음

**강의 전개 방식**

- 📌 **무엇을 만드나요?** 태그 시스템 (게시글을 분류하는 기능)
- 📌 **왜 필요한가요?** 주제별 분류, 쉬운 검색, 콘텐츠 조직화
- 📌 **어떻게 만드나요?** 다대다 관계 → 중간 테이블 → 태그 필터링

**강의내용**

- 다대다 관계 (N:M) 이해
  - 1게시글 = N개 태그
  - 1태그 = N개 게시글
  - 외래키만으로는 불가능
- 중간 테이블 설계
  - tags 테이블: id, name
  - post_tags 테이블: post_id, tag_id (복합 PRIMARY KEY)
- 태그 함수 구현
  - getPostTags(): 게시글의 모든 태그 조회
  - getOrCreateTag(): 태그가 있으면 반환, 없으면 생성
  - getAllTags(): 모든 태그 조회
- 태그 필터링
  - GROUP BY로 중복 제거
  - 태그로 게시글 검색

**실습 내용**

- tags, post_tags 테이블 생성
- functions.php에 태그 함수 추가
  - getPostTags(), getOrCreateTag(), getAllTags()
- write.php 수정
  - "PHP, MySQL, 초급" 형식 입력
  - explode(',')로 배열 변환
  - 각 태그마다 getOrCreateTag() 호출
  - post_tags에 관계 저장
- view.php 수정
  - getPostTags()로 태그 조회
  - 태그 클릭 → list.php?tag=PHP로 이동
- list.php 수정
  - 태그로 필터링 (tag 파라미터)
  - GROUP BY로 중복 게시글 제거

---

### **13장: 게시판 고급 기능 (2/3) - 사용자 기능 & 권한**

**학습목표**: 사용자 프로필, 권한 관리를 구현할 수 있음

**강의 전개 방식**

- 📌 **무엇을 만드나요?** 사용자 관리 시스템 (프로필, 권한 관리)
- 📌 **왜 필요한가요?** 사용자 추적, 스팸 방지, 관리 기능
- 📌 **어떻게 만드나요?** is_admin 추가 → 권한 확인 → 프로필 페이지

**강의내용**

- 사용자 권한 설계
  - users 테이블에 is_admin 컬럼 추가
  - 일반 사용자: 자신의 글만 관리
  - 관리자: 모든 글 관리
- 권한 확인 로직
  - WHERE id = ? AND user_id = ? (작성자 확인)
  - is_admin 확인 (관리자 권한)
  - 권한 플로우차트
- 프로필 페이지
  - 사용자 정보 표시
  - 작성 게시글 목록
  - COUNT()로 통계 표시
- 관리자 대시보드
  - 전체 통계 (게시글, 사용자, 댓글)
  - 최근 게시글 목록

**실습 내용**

- users 테이블 수정
  - ALTER TABLE users ADD COLUMN is_admin BOOLEAN DEFAULT FALSE
  - 관리자 계정 설정
- profile.php 구현
  - 사용자명으로 프로필 조회
  - COUNT()로 게시글/댓글 개수
  - 최근 게시글 10개 표시
- edit.php, delete.php 수정
  - WHERE id = ? AND user_id = ? 또는 is_admin 확인
  - 권한 없으면 에러 메시지
- admin_dashboard.php
  - COUNT(), SUM() 등 집계 함수
  - 최근 게시글, 사용자, 댓글 통계

---

수고했습니다.

조정현 교수(peterchokr@gmail.com)
영남이공대학교
