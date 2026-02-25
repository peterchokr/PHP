# 12장: 게시판 고급 기능 - 사용자 기능 & 권한

---

## 📌 이 장에서 배우는 것

### **무엇을 만드나요?**

👤 **사용자 관리 시스템** - 사용자 프로필, 작성 글 관리, 관리자 권한

### **왜 필요한가요?**

- 👥 사용자별 활동 추적
- 🔐 권한 관리 (누가 뭘 할 수 있는가)
- 🗑️ 스팸/욕설 게시글 삭제 (관리자)

### **어떻게 만드나요?**

```
1단계: 사용자 권한 설계 (일반 사용자 vs 관리자)
2단계: 프로필 페이지 구현
3단계: 권한 확인 로직 추가
```

---

## 학습목표

이 장을 학습하고 나면 다음을 할 수 있습니다:

✅ 사용자 프로필 페이지를 만들고 사용자 정보를 표시할 수 있습니다.
✅ 사용자가 작성한 게시글과 댓글을 관리할 수 있습니다.
✅ 관리자 권한을 설정하고 관리자만 수행 가능한 기능을 구현할 수 있습니다.

---

## 1️⃣ 사용자 권한 데이터베이스 설계

### 1-1 권한 시스템 이해

**두 가지 사용자 등급**:

```
【 사용자 권한 구조 】

┌─────────────────────────────────┐
│ 일반 사용자                     │
├─────────────────────────────────┤
│ ✅ 자신의 글 작성               │
│ ✅ 자신의 글 수정               │
│ ✅ 자신의 글 삭제               │
│ ❌ 다른 사람의 글 수정           │
│ ❌ 다른 사람의 글 삭제           │
│ ❌ 스팸 글 삭제                 │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│ 관리자                          │
├─────────────────────────────────┤
│ ✅ 자신의 글 작성               │
│ ✅ 자신의 글 수정               │
│ ✅ 자신의 글 삭제               │
│ ✅ 다른 사람의 글 수정           │
│ ✅ 다른 사람의 글 삭제           │
│ ✅ 스팸 글 삭제                 │
│ ✅ 시스템 관리                  │
└─────────────────────────────────┘
```

### 1-2 테이블 수정

**users 테이블에 is_admin 컬럼 추가**:

```sql
-- 방법 1: 기존 테이블 수정
ALTER TABLE users ADD COLUMN is_admin BOOLEAN DEFAULT FALSE;

-- 방법 2: 새로 생성하는 경우
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE,  -- ← 관리자 여부
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**테이블 구조**:

| 컬럼           | 타입      | 설명                                         |
| -------------- | --------- | -------------------------------------------- |
| `id`         | INT       | 사용자 ID                                    |
| `username`   | VARCHAR   | 사용자명                                     |
| `password`   | VARCHAR   | 비밀번호 (암호화)                            |
| `is_admin`   | BOOLEAN   | 관리자 여부 (TRUE=관리자, FALSE=일반 사용자) |
| `created_at` | TIMESTAMP | 가입 날짜                                    |

**데이터 예시**:

```
┌────┬──────────┬──────────────┬─────────┬────────────────────┐
│ id │ username │ password     │is_admin │ created_at         │
├────┼──────────┼──────────────┼─────────┼────────────────────┤
│ 1  │ admin    │ $2y$10$...   │ 1 (TRUE)│ 2024-01-01 ...     │
│ 2  │ kim      │ $2y$10$...   │ 0 (FALSE) 2024-01-02 ...   │
│ 3  │ lee      │ $2y$10$...   │ 0 (FALSE) 2024-01-03 ...   │
└────┴──────────┴──────────────┴─────────┴────────────────────┘

→ admin 사용자는 관리자 (모든 권한)
→ kim, lee는 일반 사용자 (자신의 글만 관리)
```

### 1-3 관리자 설정

```sql
-- 특정 사용자를 관리자로 설정
UPDATE users SET is_admin = TRUE WHERE username = 'admin';

-- 관리자 제거
UPDATE users SET is_admin = FALSE WHERE username = 'kim';

-- 모든 관리자 확인
SELECT username FROM users WHERE is_admin = TRUE;
```

---

## 2️⃣ 사용자 프로필 기능

### 2-1 profile.php (사용자 프로필 페이지)

**목적**: 사용자의 활동 정보를 한 페이지에 표시

```php
<?php

require 'config.php';
require 'functions.php';

// URL에서 사용자명 받기
$username = $_GET['username'] ?? '';

if (empty($username)) {
    header("Location: list.php");
    exit;
}

try {
    // ===== 1단계: 사용자 정보 조회 =====
    // SELECT id, username, created_at FROM users WHERE username = ?
    // 목적: 사용자가 존재하는지 확인 + 기본 정보 조회
    $user_sql = "SELECT id, username, created_at FROM users WHERE username = ?";
    $user_stmt = $pdo->prepare($user_sql);
    $user_stmt->execute([$username]);
  
    $user = $user_stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$user) {
        die("사용자를 찾을 수 없습니다");
    }
  
    $user_id = $user['id'];
  
    // ===== 2단계: 사용자가 작성한 게시글 조회 =====
    // SELECT id, title, views, created_at FROM posts WHERE user_id = ?
    // 목적: 이 사용자가 작성한 게시글을 최신순으로 조회 (상위 10개)
    $posts_sql = "
        SELECT id, title, views, created_at 
        FROM posts 
        WHERE user_id = ? 
        ORDER BY created_at DESC 
        LIMIT 10
    ";
    $posts_stmt = $pdo->prepare($posts_sql);
    $posts_stmt->execute([$user_id]);
    $posts = $posts_stmt->fetchAll(PDO::FETCH_ASSOC);
  
    // ===== 3단계: 사용자가 작성한 게시글 총 개수 =====
    // COUNT(*): 행의 개수를 세는 함수
    // 목적: 사용자가 몇 개의 게시글을 작성했는지 알기
    // 예: COUNT(*) = 5 → 5개 게시글 작성함
    $count_sql = "SELECT COUNT(*) as total FROM posts WHERE user_id = ?";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute([$user_id]);
    $count_result = $count_stmt->fetch(PDO::FETCH_ASSOC);
    $total_posts = $count_result['total'];
  
    // ===== 4단계: 사용자가 작성한 댓글 총 개수 =====
    // 목적: 사용자가 몇 개의 댓글을 작성했는지 알기
    $comment_count_sql = "SELECT COUNT(*) as total FROM comments WHERE user_id = ?";
    $comment_count_stmt = $pdo->prepare($comment_count_sql);
    $comment_count_stmt->execute([$user_id]);
    $comment_count_result = $comment_count_stmt->fetch(PDO::FETCH_ASSOC);
    $total_comments = $comment_count_result['total'];
  
} catch (PDOException $e) {
    die("조회 실패: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>프로필 - <?php echo htmlspecialchars($username); ?></title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 800px; margin: 50px auto; padding: 20px; }
        .profile-header { background: #f5f5f5; padding: 20px; border-radius: 5px; }
        .profile-name { font-size: 24px; font-weight: bold; color: navy; }
        .profile-stat { display: inline-block; margin-right: 20px; }
        .stat-number { font-size: 20px; font-weight: bold; color: navy; }
        .post-list { margin-top: 20px; }
        .post-item { border-left: 3px solid navy; padding: 10px; margin: 10px 0; background: #f9f9f9; }
        a { color: navy; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="profile-header">
    <div class="profile-name">👤 <?php echo htmlspecialchars($user['username']); ?></div>
  
    <div style="margin-top: 15px; color: #666; font-size: 14px;">
        가입일: <?php echo substr($user['created_at'], 0, 10); ?>
    </div>
  
    <!-- 통계 표시 -->
    <div style="margin-top: 10px;">
        <div class="profile-stat">
            <div class="stat-number"><?php echo $total_posts; ?></div>
            <div>게시글</div>
        </div>
        <div class="profile-stat">
            <div class="stat-number"><?php echo $total_comments; ?></div>
            <div>댓글</div>
        </div>
    </div>
</div>

<div class="post-list">
    <h2>📝 최근 게시글 (상위 10개)</h2>
  
    <?php if (empty($posts)): ?>
        <p style="color: #999;">작성한 게시글이 없습니다.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post-item">
                <a href="view.php?id=<?php echo $post['id']; ?>">
                    <strong><?php echo htmlspecialchars($post['title']); ?></strong>
                </a>
                <span style="color: #999; font-size: 12px;">
                    조회: <?php echo $post['views']; ?> | 
                    <?php echo substr($post['created_at'], 0, 10); ?>
                </span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<a href="list.php">← 게시판으로</a>

</body>
</html>
```

---

## 2️⃣ 작성자 확인 기능

### 2-1 edit.php 수정 (작성자 확인)

**작동 흐름**:

```
【 게시글 수정 시 권한 확인 】

사용자가 [수정] 클릭
    ↓
edit.php?id=1 요청
    ↓
게시글 조회: SELECT ... WHERE id = 1
    ↓
post['user_id'] === $_SESSION['user_id'] ?
    ├─ YES (자신의 글) → 수정 가능 ✅
    └─ NO (다른 사람 글)
         ↓
      is_admin ?
        ├─ YES (관리자) → 수정 가능 ✅
        └─ NO (일반 사용자) → 에러 ❌
```

```php
<?php

require 'config.php';

// 로그인 확인
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$error = '';
$post = null;
$id = $_GET['id'] ?? null;

if (!$id || !isset($_SESSION['user_id'])) {
    header("Location: list.php");
    exit;
}

try {
    // 게시글 조회
    // SELECT ... WHERE id = ?
    // 목적: 이 게시글의 작성자를 확인
    $sql = "SELECT id, title, content, user_id FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
  
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$post) {
        die("게시글을 찾을 수 없습니다");
    }
  
    // ===== 권한 확인 =====
    // 작성자 확인 (관리자는 모두 수정 가능)
    // 일반 사용자는 자신의 글만 수정 가능
  
    // $_SESSION['is_admin']
    // 목적: 현재 사용자가 관리자인지 확인
    // 로그인 시 세션에 저장된 값
    $is_admin = $_SESSION['is_admin'] ?? FALSE;
  
    // 권한 확인 로직:
    // 1. post['user_id'] !== $_SESSION['user_id']
    //    → 다른 사람의 글
    // 2. !$is_admin
    //    → 관리자 아님
    // 3. 둘 다 참이면 → 수정 불가
  
    if ($post['user_id'] !== $_SESSION['user_id'] && !$is_admin) {
        die("자신의 게시글만 수정할 수 있습니다");
    }
  
} catch (PDOException $e) {
    die("조회 실패: " . $e->getMessage());
}

// POST 요청 처리 (수정)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = htmlspecialchars(trim($_POST['title'] ?? ''));
        $content = htmlspecialchars(trim($_POST['content'] ?? ''));
  
        if (empty($title) || empty($content)) {
            throw new Exception("제목과 내용을 입력하세요");
        }
  
        // UPDATE 쿼리
        // 목적: 게시글 내용 업데이트
        // updated_at은 자동으로 현재 시간 업데이트됨
        $sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $content, $id]);
  
        header("Location: view.php?id=$id");
        exit;
  
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<!-- HTML 폼 생략 (기존과 동일) -->
```

### 2-2 delete.php 수정 (작성자 확인)

```php
<?php

require 'config.php';

// 로그인 확인
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

try {
    $id = $_GET['id'] ?? null;
  
    if (!$id) {
        throw new Exception("잘못된 요청입니다");
    }
  
    // 게시글 조회
    // SELECT user_id FROM posts WHERE id = ?
    // 목적: 게시글 작성자 확인
    $sql = "SELECT user_id FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
  
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$post) {
        throw new Exception("게시글을 찾을 수 없습니다");
    }
  
    // ===== 권한 확인 =====
    // 작성자 또는 관리자인지 확인
  
    // $_SESSION['is_admin']
    // 목적: 현재 사용자가 관리자인지 확인
    $is_admin = $_SESSION['is_admin'] ?? FALSE;
  
    // 권한 확인:
    // 조건 1: post['user_id'] !== $_SESSION['user_id']
    //         → 다른 사람의 글
    // 조건 2: !$is_admin
    //         → 관리자 아님
    // 둘 다 참이면 삭제 불가능
  
    if ($post['user_id'] !== $_SESSION['user_id'] && !$is_admin) {
        throw new Exception("자신의 게시글만 삭제할 수 있습니다");
    }
  
    // DELETE 쿼리
    // 목적: 게시글 삭제 (댓글, 파일, 태그는 CASCADE로 자동 삭제)
    $delete_sql = "DELETE FROM posts WHERE id = ?";
    $delete_stmt = $pdo->prepare($delete_sql);
    $delete_stmt->execute([$id]);
  
    header("Location: list.php");
    exit;
  
} catch (Exception $e) {
    die("삭제 실패: " . htmlspecialchars($e->getMessage()));
}

?>
```

---

## 3️⃣ 관리자 기능

### 3-1 admin_dashboard.php (관리자 대시보드)

**목적**: 관리자만 볼 수 있는 시스템 통계 페이지

```php
<?php

require 'config.php';

// 관리자 권한 확인
// $_SESSION['is_admin'] === TRUE인지 확인
// 관리자가 아니면 접근 불가
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    die("관리자만 접근 가능합니다");
}

try {
    // ===== 전체 통계 계산 =====
  
    // 1. 총 게시글 수
    // COUNT(*): 모든 행의 개수
    // 목적: 게시판에 몇 개의 글이 있는가
    $posts_count_sql = "SELECT COUNT(*) as total FROM posts";
    $posts_count_stmt = $pdo->prepare($posts_count_sql);
    $posts_count_stmt->execute();
    $stats['posts'] = $posts_count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
  
    // 2. 총 사용자 수
    // 목적: 가입한 사용자가 몇 명인가
    $users_count_sql = "SELECT COUNT(*) as total FROM users";
    $users_count_stmt = $pdo->prepare($users_count_sql);
    $users_count_stmt->execute();
    $stats['users'] = $users_count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
  
    // 3. 총 댓글 수
    // 목적: 전체 시스템의 댓글이 몇 개인가
    $comments_count_sql = "SELECT COUNT(*) as total FROM comments";
    $comments_count_stmt = $pdo->prepare($comments_count_sql);
    $comments_count_stmt->execute();
    $stats['comments'] = $comments_count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
  
    // 4. 오늘 작성된 게시글
    // DATE(created_at) = CURDATE()
    // 목적: 오늘 작성된 게시글만 세기
    // 예: CURDATE() = 2024-01-12 → 2024-01-12에 작성된 글만
    $today_posts_sql = "SELECT COUNT(*) as total FROM posts WHERE DATE(created_at) = CURDATE()";
    $today_posts_stmt = $pdo->prepare($today_posts_sql);
    $today_posts_stmt->execute();
    $stats['today_posts'] = $today_posts_stmt->fetch(PDO::FETCH_ASSOC)['total'];
  
    // 5. 최근 게시글 (상위 5개)
    // JOIN users: 게시글 작성자 정보도 함께 조회
    // 목적: 최근에 작성된 글을 확인
    $recent_sql = "
        SELECT p.id, p.title, u.username, p.created_at, p.views 
        FROM posts p 
        JOIN users u ON p.user_id = u.id 
        ORDER BY p.created_at DESC 
        LIMIT 5
    ";
    $recent_stmt = $pdo->prepare($recent_sql);
    $recent_stmt->execute();
    $recent_posts = $recent_stmt->fetchAll(PDO::FETCH_ASSOC);
  
} catch (PDOException $e) {
    die("조회 실패: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>관리자 대시보드</title>
    <style>
        body { font-family: '맑은 고딕'; max-width: 900px; margin: 50px auto; padding: 20px; }
        h1 { color: navy; }
        .stat-box { 
            display: inline-block; 
            width: 22%; 
            margin: 10px 1%; 
            padding: 15px; 
            background: #f5f5f5; 
            text-align: center; 
        }
        .stat-number { font-size: 28px; font-weight: bold; color: navy; }
        .stat-label { color: #666; margin-top: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: navy; color: white; }
        a { color: navy; text-decoration: none; }
    </style>
</head>
<body>

<h1>⚙️ 관리자 대시보드</h1>

<h2>📊 통계</h2>
<div>
    <div class="stat-box">
        <div class="stat-number"><?php echo $stats['posts']; ?></div>
        <div class="stat-label">전체 게시글</div>
    </div>
    <div class="stat-box">
        <div class="stat-number"><?php echo $stats['users']; ?></div>
        <div class="stat-label">전체 사용자</div>
    </div>
    <div class="stat-box">
        <div class="stat-number"><?php echo $stats['comments']; ?></div>
        <div class="stat-label">전체 댓글</div>
    </div>
    <div class="stat-box">
        <div class="stat-number"><?php echo $stats['today_posts']; ?></div>
        <div class="stat-label">오늘 게시글</div>
    </div>
</div>

<h2>🆕 최근 게시글</h2>
<table>
    <tr>
        <th>제목</th>
        <th>작성자</th>
        <th>작성일</th>
        <th>조회</th>
    </tr>
    <?php foreach ($recent_posts as $post): ?>
        <tr>
            <td><a href="view.php?id=<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></td>
            <td><?php echo htmlspecialchars($post['username']); ?></td>
            <td><?php echo substr($post['created_at'], 0, 10); ?></td>
            <td><?php echo $post['views']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="list.php">← 게시판으로</a>

</body>
</html>
```

---

## 4️⃣ 과제

### 필수 과제

```
1. 데이터베이스 수정
   - users 테이블에 is_admin 컬럼 추가
   - 테스트용 관리자 계정 1개 생성

2. 프로필 페이지
   - profile.php 구현
   - 사용자명으로 프로필 접근 가능한지 확인
   - 게시글, 댓글 개수가 올바르게 표시되는지 확인

3. 작성자 확인
   - edit.php, delete.php에서 작성자 확인 로직 추가
   - 다른 사용자의 글은 수정/삭제 불가능한지 확인
   - 관리자는 모든 글을 수정/삭제 가능한지 확인

4. 로그인 시 관리자 정보 저장
   - login.php에서 is_admin을 $_SESSION에 저장
   - 나중에 권한 확인할 때 사용
```

### 선택 과제

```
1. 관리자 대시보드 구현 및 권한 확인
2. 사용자 관리 페이지 (사용자 목록, 관리자 설정)
3. 게시글 목록에서 작성자 이름을 클릭하면 프로필 페이지로 이동
```

---

## 5️⃣ 핵심 개념

### 권한 시스템

**권한 확인 로직**:

```php
// 세션에 권한 정보 저장 (로그인 시)
$_SESSION['is_admin'] = $row['is_admin'];  // TRUE 또는 FALSE

// 권한 확인 (수정/삭제 시)
if ($post['user_id'] !== $_SESSION['user_id'] && !$_SESSION['is_admin']) {
    die("권한이 없습니다");
}

// 해석:
// $post['user_id'] !== $_SESSION['user_id']
//   → 다른 사람의 글인가?
// !$_SESSION['is_admin']
//   → 관리자가 아닌가?
// 둘 다 참이면 → 권한 없음
```

**권한 확인 표**:

```
상황                              허용?
─────────────────────────────────────────
본인 글 + 일반 사용자            ✅ 가능
다른 사람 글 + 일반 사용자        ❌ 불가
본인 글 + 관리자                ✅ 가능
다른 사람 글 + 관리자            ✅ 가능
```

### COUNT와 GROUP BY

**COUNT(*): 행의 개수**:

```php
// 모든 게시글 수
SELECT COUNT(*) as total FROM posts;
// 결과: total = 100

// 사용자 1번의 게시글 수
SELECT COUNT(*) as total FROM posts WHERE user_id = 1;
// 결과: total = 5
```

### 프로필 페이지의 JOIN

```php
// 사용자 정보와 게시글을 함께 조회
SELECT p.id, p.title, u.username
FROM posts p
JOIN users u ON p.user_id = u.id
WHERE u.username = 'kim';

// 결과:
// id=1, title="첫번째 글", username="kim"
// id=2, title="두번째 글", username="kim"
// ...
```

---

## 6️⃣ 주의사항

1. **로그인 시 is_admin 저장**: 로그인할 때 반드시 관리자 정보도 세션에 저장
2. **권한 확인 위치**: 수정/삭제 전에 반드시 권한 확인
3. **세션 재확인**: 중요한 작업 시 데이터베이스에서 직접 권한 재확인
4. **COUNT의 성능**: 대량 데이터일 때는 캐싱 고려

---

수고했습니다.   
조정현 교수(peterchokr@gmail.com)     영남이공대학교

이 수업자료는 Claude와 Gemini를 이용하여 제작되었습니다.
