# 11장: 게시판 시스템 구현 (3/3) - 파일첨부 기능 추가

---

## 📌 이 장의 특징

✅ **완전한 코드**: (9장 + 10장) 코드를 모두 포함 + 파일 첨부 기능 추가

---

## 🔑 필수 파일

### 1️⃣ config.php

```php
<?php

// config.php - 모든 페이지에서 include
// 역할: DB 연결 + 세션 시작

$host = 'localhost';
$dbname = 'board_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB 연결 실패: " . $e->getMessage());
}

session_start();

// 로그인 확인 함수
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}

?>
```

### 2️⃣ login.php

```php
<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: v3_list.php");  // 변경: v3_list.php로 이동
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
  
    if ($username === 'user1' && $password === 'password123') {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = 'user1';
        header("Location: v3_list.php");  // 변경: v3_list.php로 이동
        exit;
    } else {
        $error = '사용자명 또는 비밀번호가 잘못되었습니다';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: '맑은 고딕', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            color: navy;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input:focus {
            outline: none;
            border-color: navy;
            box-shadow: 0 0 5px rgba(0, 0, 139, 0.3);
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: navy;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #000080;
        }
        .error {
            color: #d32f2f;
            background-color: #ffebee;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #d32f2f;
        }
        .test-info {
            background-color: #e8f5e9;
            padding: 12px;
            border-radius: 5px;
            margin-top: 20px;
            border-left: 4px solid #4caf50;
            font-size: 12px;
            color: #333;
        }
        .test-info strong {
            display: block;
            margin-bottom: 5px;
            color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>📝 게시판 로그인</h1>
  
    <?php if ($error): ?>
        <div class="error">❌ <?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
  
    <form method="POST">
        <div class="form-group">
            <label for="username">사용자명:</label>
            <input type="text" id="username" name="username" placeholder="사용자명 입력" required autofocus>
        </div>
  
        <div class="form-group">
            <label for="password">비밀번호:</label>
            <input type="password" id="password" name="password" placeholder="비밀번호 입력" required>
        </div>
  
        <button type="submit">로그인</button>
    </form>
  
    <div class="test-info">
        <strong>📝 테스트 계정</strong>
        사용자명: user1<br>
        비밀번호: password123
    </div>
</div>

</body>
</html>
```

### 3️⃣ logout.php

```php
<?php

session_start();
session_destroy();
header("Location: login.php");
exit;

?>
```

---

## 📊 필요한 테이블 (SQL)

```sql
-- posts 테이블 (9장 기존)
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- comments 테이블 (10장 기존)
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    content LONGTEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

-- attachments 테이블 (11장 추가)
CREATE TABLE attachments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    stored_name VARCHAR(255) NOT NULL,
    file_size INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);
```

---

## ⚠️ uploads 디렉토리 생성

```bash
mkdir -p boards/uploads/files
chmod 777 boards/uploads/files
```

---

## 1️⃣ upload_file.php - 파일 업로드 함수

```php
<?php

// upload_file.php - 파일 업로드 처리
// 역할: 안전한 파일 업로드 함수 제공

function uploadFile($file, $post_id) {
    // 파일 검증
    $max_size = 10 * 1024 * 1024;  // 10MB
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt'];
  
    // 파일 크기 확인
    if ($file['size'] > $max_size) {
        throw new Exception("파일 크기는 10MB 이하여야 합니다");
    }
  
    // 파일명 에러 확인
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("파일 업로드 오류: " . $file['error']);
    }
  
    // 확장자 확인
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed_ext)) {
        throw new Exception("허용되지 않는 파일 형식입니다: " . $ext);
    }
  
    // 디렉토리 생성
    $upload_dir = __DIR__ . '/uploads/files';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
  
    // 안전한 파일명 생성 (타임스탐프_포스트ID_원본파일명)
    $timestamp = time();
    $stored_name = "{$timestamp}_{$post_id}_" . basename($file['name']);
    $file_path = $upload_dir . '/' . $stored_name;
  
    // 파일 이동
    if (!move_uploaded_file($file['tmp_name'], $file_path)) {
        throw new Exception("파일을 저장할 수 없습니다");
    }
  
    return [
        'original_name' => $file['name'],
        'stored_name' => $stored_name,
        'file_size' => $file['size']
    ];
}

?>
```

---

## 2️⃣ v3_list.php - 게시글 목록 (댓글 + 파일 개수 표시)

**【 11장에서 새로 배운 것 】**

- LEFT JOIN으로 댓글 + 첨부파일 개수 함께 조회
- 각 게시글 옆에 댓글 개수 + 파일 개수 표시

```php
<?php

require 'config.php';
requireLogin();

try {
    // 11장: 두 개의 LEFT JOIN으로 댓글 + 파일 개수 함께 조회
    // COUNT(DISTINCT comments.id): 댓글 개수
    // COUNT(DISTINCT attachments.id): 첨부파일 개수
    $sql = "
        SELECT 
            posts.id,
            posts.title,
            posts.views,
            posts.created_at,
            COUNT(DISTINCT comments.id) AS comment_count,
            COUNT(DISTINCT attachments.id) AS file_count
        FROM posts
        LEFT JOIN comments ON posts.id = comments.post_id
        LEFT JOIN attachments ON posts.id = attachments.post_id
        GROUP BY posts.id
        ORDER BY posts.id DESC
    ";
  
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
} catch (Exception $e) {
    $error = "오류: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시판 목록</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: '맑은 고딕', sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid navy;
            padding-bottom: 15px;
        }
        h1 { color: navy; font-size: 28px; }
        .header-right {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: navy; color: white; }
        .btn-primary:hover { background: #000080; }
        .btn-secondary { background: #888; color: white; }
        .btn-secondary:hover { background: #666; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #f0f0f0;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid navy;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover { background: #f9f9f9; }
        .title-link {
            color: navy;
            text-decoration: none;
            font-weight: bold;
        }
        .title-link:hover { text-decoration: underline; }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            margin-right: 5px;
        }
        .badge-comment { background: #e8f4f8; color: #0066cc; }
        .badge-file { background: #fff3e0; color: #f57c00; }  /* 11장: 파일 개수 배지 */
        .empty { text-align: center; color: #999; padding: 40px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>📝 게시판</h1>
        <div class="header-right">
            <span style="padding: 10px 20px;">👤 <?php echo htmlspecialchars($_SESSION['username']); ?>님</span>
            <a href="v3_add.php" class="btn btn-primary">✏️ 글쓰기</a>
            <a href="logout.php" class="btn btn-secondary">로그아웃</a>
        </div>
    </div>
  
    <?php if (isset($error)): ?>
        <div style="color: red; padding: 10px; background: #ffebee; border-radius: 5px; margin-bottom: 20px;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
  
    <?php if (empty($posts)): ?>
        <div class="empty">등록된 게시글이 없습니다.</div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">번호</th>
                    <th>제목</th>
                    <th style="width: 120px;">메타데이터</th>
                    <th style="width: 150px;">작성일</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($post['id']); ?></td>
                        <td>
                            <a href="v3_view.php?id=<?php echo $post['id']; ?>" class="title-link">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </td>
                        <td>
                            <!-- 댓글 개수 -->
                            <span class="badge badge-comment">
                                💬 <?php echo htmlspecialchars($post['comment_count']); ?>
                            </span>
                            <!-- 11장: 파일 개수 표시 -->
                            <span class="badge badge-file">
                                📎 <?php echo htmlspecialchars($post['file_count']); ?>
                            </span>
                            조회 <?php echo htmlspecialchars($post['views']); ?>
                        </td>
                        <td><?php echo date('Y-m-d H:i', strtotime($post['created_at'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
```

---

## 3️⃣ v3_view.php - 게시글 보기 + 댓글 + 첨부파일

**【 11장에서 새로 배운 것 】**

- 첨부파일 목록 조회 및 표시
- 파일 다운로드 링크 추가
- 파일 삭제 기능 추가

```php
<?php

require 'config.php';
requireLogin();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: v3_list.php");
    exit;
}

try {
    // 게시글 조회
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$post) {
        header("Location: v3_list.php");
        exit;
    }
  
    // 조회수 증가
    $update_sql = "UPDATE posts SET views = views + 1 WHERE id = ?";
    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->execute([$id]);
  
    // 댓글 조회
    $comments_sql = "SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC";
    $comments_stmt = $pdo->prepare($comments_sql);
    $comments_stmt->execute([$id]);
    $comments = $comments_stmt->fetchAll(PDO::FETCH_ASSOC);
  
    // 11장: 첨부파일 조회
    $attachments_sql = "SELECT id, original_name, stored_name, file_size, created_at 
                        FROM attachments WHERE post_id = ? ORDER BY created_at DESC";
    $attachments_stmt = $pdo->prepare($attachments_sql);
    $attachments_stmt->execute([$id]);
    $attachments = $attachments_stmt->fetchAll(PDO::FETCH_ASSOC);
  
} catch (Exception $e) {
    $error = "오류: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시글 보기</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: '맑은 고딕', sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .post-header {
            border-bottom: 2px solid navy;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        h1 { color: navy; margin-bottom: 10px; }
        .post-meta {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .post-content {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            line-height: 1.8;
            white-space: pre-wrap;
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: navy; color: white; }
        .btn-primary:hover { background: #000080; }
        .btn-secondary { background: #888; color: white; }
        .btn-secondary:hover { background: #666; }
        .btn-danger { background: #d32f2f; color: white; }
        .btn-danger:hover { background: #b71c1c; }
  
        /* 11장: 첨부파일 섹션 스타일 */
        .attachments-section {
            background: #fff8e1;
            border: 1px solid #ffb74d;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 30px;
        }
        .attachments-title {
            font-size: 16px;
            font-weight: bold;
            color: #e65100;
            margin-bottom: 15px;
        }
        .attachment-item {
            background: white;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid #ffb74d;
        }
        .attachment-name { font-weight: bold; color: #333; }
        .attachment-size { color: #999; font-size: 12px; }
        .attachment-actions { display: flex; gap: 10px; }
        .attachment-actions a {
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }
        .attachment-download {
            background: #4caf50;
            color: white;
        }
        .attachment-download:hover { background: #388e3c; }
        .attachment-delete {
            background: #d32f2f;
            color: white;
        }
        .attachment-delete:hover { background: #b71c1c; }
        .empty-attachment { color: #999; font-style: italic; }
  
        /* 댓글 섹션 */
        .comments-section {
            margin-top: 40px;
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }
        .comments-title {
            font-size: 18px;
            font-weight: bold;
            color: navy;
            margin-bottom: 20px;
        }
        .comment {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #0066cc;
        }
        .comment-meta {
            color: #666;
            font-size: 13px;
            margin-bottom: 8px;
        }
        .comment-content {
            color: #333;
            margin-bottom: 10px;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .comment-actions {
            display: flex;
            gap: 10px;
            font-size: 12px;
        }
        .comment-actions a {
            color: #0066cc;
            text-decoration: none;
            cursor: pointer;
        }
        .comment-actions a:hover { text-decoration: underline; }
  
        /* 댓글 작성 폼 */
        .comment-form {
            background: #f0f4ff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: '맑은 고딕', sans-serif;
            resize: vertical;
            min-height: 100px;
        }
        .empty-comment { color: #999; font-style: italic; padding: 20px; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <div class="post-header">
        <h1><?php echo htmlspecialchars($post['title']); ?></h1>
        <div class="post-meta">
            👤 user (조회: <?php echo $post['views']; ?>) | 📅 <?php echo date('Y-m-d H:i', strtotime($post['created_at'])); ?>
        </div>
    </div>
  
    <div class="post-content">
        <?php echo htmlspecialchars($post['content']); ?>
    </div>
  
    <!-- 11장: 첨부파일 섹션 -->
    <?php if (!empty($attachments)): ?>
        <div class="attachments-section">
            <div class="attachments-title">📎 첨부파일 (<?php echo count($attachments); ?>)</div>
            <?php foreach ($attachments as $attachment): ?>
                <div class="attachment-item">
                    <div>
                        <div class="attachment-name"><?php echo htmlspecialchars($attachment['original_name']); ?></div>
                        <div class="attachment-size"><?php echo round($attachment['file_size'] / 1024, 1); ?> KB</div>
                    </div>
                    <div class="attachment-actions">
                        <a href="v3_download.php?id=<?php echo $attachment['id']; ?>" class="attachment-download">📥 다운로드</a>
                        <a href="v3_delete_attachment.php?id=<?php echo $attachment['id']; ?>&post_id=<?php echo $post['id']; ?>" class="attachment-delete" onclick="return confirm('삭제하시겠습니까?');">🗑️ 삭제</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
  
    <div class="button-group">
        <a href="v3_list.php" class="btn btn-secondary">⬅️ 목록</a>
        <a href="v3_edit.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">✏️ 수정</a>
        <a href="v3_delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger" onclick="return confirm('삭제하시겠습니까?');">🗑️ 삭제</a>
    </div>
  
    <!-- 댓글 섹션 -->
    <div class="comments-section">
        <div class="comments-title">💬 댓글 (<?php echo count($comments); ?>)</div>
  
        <!-- 댓글 작성 폼 -->
        <div class="comment-form">
            <form method="POST" action="v3_add_comment.php">
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
  
                <div class="form-group">
                    <label for="content">댓글 작성:</label>
                    <textarea id="content" name="content" required placeholder="댓글을 입력하세요"></textarea>
                </div>
  
                <button type="submit" class="btn btn-primary" style="width: auto;">💬 댓글 작성</button>
            </form>
        </div>
  
        <!-- 댓글 목록 -->
        <?php if (empty($comments)): ?>
            <div class="empty-comment">등록된 댓글이 없습니다.</div>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <div class="comment-meta">
                        👤 User | 📅 <?php echo date('Y-m-d H:i', strtotime($comment['created_at'])); ?>
                    </div>
                    <div class="comment-content">
                        <?php echo htmlspecialchars($comment['content']); ?>
                    </div>
                    <div class="comment-actions">
                        <a href="v3_edit_comment.php?id=<?php echo $comment['id']; ?>&post_id=<?php echo $post['id']; ?>">✏️ 수정</a>
                        <a href="v3_delete_comment.php?id=<?php echo $comment['id']; ?>&post_id=<?php echo $post['id']; ?>" onclick="return confirm('삭제하시겠습니까?');">🗑️ 삭제</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
```

---

## 4️⃣ v3_add.php - 게시글 작성 + 파일 업로드

**【 11장에서 새로 배운 것 】**

- 파일 업로드 폼 추가 (multipart/form-data)
- 게시글 저장 후 파일도 저장
- 파일 검증 및 안전한 저장

```php
<?php

require 'config.php';
require 'upload_file.php';  // 11장: 파일 업로드 함수 포함
requireLogin();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
  
    if (empty($title) || empty($content)) {
        $error = '제목과 내용을 모두 입력하세요';
    } else {
        try {
            // 게시글 먼저 저장
            $sql = "INSERT INTO posts (user_id, title, content, views) VALUES (?, ?, ?, 0)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_SESSION['user_id'], $title, $content]);
  
            $post_id = $pdo->lastInsertId();
  
            // 11장: 파일이 있으면 저장
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $file_info = uploadFile($_FILES['file'], $post_id);
  
                // DB에 파일 정보 저장
                $file_sql = "INSERT INTO attachments (post_id, user_id, original_name, stored_name, file_size) 
                             VALUES (?, ?, ?, ?, ?)";
                $file_stmt = $pdo->prepare($file_sql);
                $file_stmt->execute([
                    $post_id,
                    $_SESSION['user_id'],
                    $file_info['original_name'],
                    $file_info['stored_name'],
                    $file_info['file_size']
                ]);
            }
  
            header("Location: v3_list.php");
            exit;
        } catch (Exception $e) {
            $error = "오류: " . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시글 작성</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: '맑은 고딕', sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: navy; margin-bottom: 30px; }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: '맑은 고딕', sans-serif;
            font-size: 14px;
        }
        textarea { resize: vertical; min-height: 300px; }
  
        /* 11장: 파일 입력 스타일 */
        .file-upload-section {
            background: #f0f8ff;
            border: 2px dashed #0066cc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .file-upload-section label {
            color: #0066cc;
            font-weight: bold;
        }
        .file-help {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
  
        .button-group {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: navy; color: white; }
        .btn-primary:hover { background: #000080; }
        .btn-secondary { background: #888; color: white; }
        .btn-secondary:hover { background: #666; }
        .error { color: red; background: #ffebee; padding: 12px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>✏️ 새 게시글 작성</h1>
  
    <?php if ($error): ?>
        <div class="error">❌ <?php echo $error; ?></div>
    <?php endif; ?>
  
    <form method="POST" enctype="multipart/form-data">  <!-- 11장: enctype 추가 -->
        <div class="form-group">
            <label for="title">제목:</label>
            <input type="text" id="title" name="title" placeholder="제목을 입력하세요" required>
        </div>
  
        <div class="form-group">
            <label for="content">내용:</label>
            <textarea id="content" name="content" placeholder="내용을 입력하세요" required></textarea>
        </div>
  
        <!-- 11장: 파일 업로드 추가 -->
        <div class="form-group file-upload-section">
            <label for="file">📎 파일 첨부 (선택):</label>
            <input type="file" id="file" name="file">
            <div class="file-help">
                지원 형식: jpg, jpeg, png, gif, pdf, doc, docx, txt (최대 10MB)
            </div>
        </div>
  
        <div class="button-group">
            <button type="submit" class="btn btn-primary">✅ 작성</button>
            <a href="v3_list.php" class="btn btn-secondary">⬅️ 취소</a>
        </div>
    </form>
</div>

</body>
</html>
```

---

## 5️⃣ v3_edit.php - 게시글 수정 + 파일 추가

**【 11장에서 새로 배운 것 】**

- 기존 파일 목록 표시
- 새로운 파일 추가 가능
- 파일 검증 및 저장

```php
<?php

require 'config.php';
require 'upload_file.php';  // 11장: 파일 업로드 함수 포함
requireLogin();

$id = $_GET['id'] ?? null;
$error = '';

if (!$id) {
    header("Location: v3_list.php");
    exit;
}

try {
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$post) {
        header("Location: v3_list.php");
        exit;
    }
  
    // 11장: 현재 첨부파일 조회
    $files_sql = "SELECT * FROM attachments WHERE post_id = ? ORDER BY created_at DESC";
    $files_stmt = $pdo->prepare($files_sql);
    $files_stmt->execute([$id]);
    $files = $files_stmt->fetchAll(PDO::FETCH_ASSOC);
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
  
        if (empty($title) || empty($content)) {
            $error = '제목과 내용을 모두 입력하세요';
        } else {
            $update_sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([$title, $content, $id]);
  
            // 11장: 파일이 있으면 추가
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $file_info = uploadFile($_FILES['file'], $id);
  
                $file_sql = "INSERT INTO attachments (post_id, user_id, original_name, stored_name, file_size) 
                             VALUES (?, ?, ?, ?, ?)";
                $file_stmt = $pdo->prepare($file_sql);
                $file_stmt->execute([
                    $id,
                    $_SESSION['user_id'],
                    $file_info['original_name'],
                    $file_info['stored_name'],
                    $file_info['file_size']
                ]);
            }
  
            header("Location: v3_view.php?id=$id");
            exit;
        }
    }
} catch (Exception $e) {
    $error = "오류: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시글 수정</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: '맑은 고딕', sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: navy; margin-bottom: 30px; }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: '맑은 고딕', sans-serif;
            font-size: 14px;
        }
        textarea { resize: vertical; min-height: 300px; }
  
        /* 11장: 현재 첨부파일 목록 */
        .current-files {
            background: #fff8e1;
            border: 1px solid #ffb74d;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .current-files-title {
            font-weight: bold;
            color: #e65100;
            margin-bottom: 10px;
        }
        .file-item {
            background: white;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 3px solid #ffb74d;
        }
        .file-item a {
            color: #d32f2f;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }
        .file-item a:hover { text-decoration: underline; }
  
        /* 11장: 파일 입력 섹션 */
        .file-upload-section {
            background: #f0f8ff;
            border: 2px dashed #0066cc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .file-upload-section label {
            color: #0066cc;
            font-weight: bold;
        }
        .file-help {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
  
        .button-group {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: navy; color: white; }
        .btn-primary:hover { background: #000080; }
        .btn-secondary { background: #888; color: white; }
        .btn-secondary:hover { background: #666; }
        .error { color: red; background: #ffebee; padding: 12px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>✏️ 게시글 수정</h1>
  
    <?php if ($error): ?>
        <div class="error">❌ <?php echo $error; ?></div>
    <?php endif; ?>
  
    <form method="POST" enctype="multipart/form-data">  <!-- 11장: enctype 추가 -->
        <div class="form-group">
            <label for="title">제목:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
        </div>
  
        <div class="form-group">
            <label for="content">내용:</label>
            <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        </div>
  
        <!-- 11장: 현재 첨부파일 표시 -->
        <?php if (!empty($files)): ?>
            <div class="current-files">
                <div class="current-files-title">📎 현재 첨부파일 (<?php echo count($files); ?>)</div>
                <?php foreach ($files as $file): ?>
                    <div class="file-item">
                        <div><?php echo htmlspecialchars($file['original_name']); ?> (<?php echo round($file['file_size'] / 1024, 1); ?> KB)</div>
                        <a href="v3_delete_attachment.php?id=<?php echo $file['id']; ?>&post_id=<?php echo $id; ?>" onclick="return confirm('삭제하시겠습니까?');">🗑️ 삭제</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
  
        <!-- 11장: 새 파일 업로드 -->
        <div class="form-group file-upload-section">
            <label for="file">📎 파일 추가 (선택):</label>
            <input type="file" id="file" name="file">
            <div class="file-help">
                지원 형식: jpg, jpeg, png, gif, pdf, doc, docx, txt (최대 10MB)
            </div>
        </div>
  
        <div class="button-group">
            <button type="submit" class="btn btn-primary">✅ 수정</button>
            <a href="v3_view.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary">⬅️ 취소</a>
        </div>
    </form>
</div>

</body>
</html>
```

---

## 6️⃣ v3_delete.php - 게시글 삭제

**【 동일】**

- 게시글 삭제 시 첨부파일은 CASCADE로 자동 삭제

```php
<?php

require 'config.php';
requireLogin();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: v3_list.php");
    exit;
}

try {
    // 게시글 삭제 (댓글과 파일은 CASCADE로 자동 삭제)
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
  
    header("Location: v3_list.php");
    exit;
} catch (Exception $e) {
    die("오류: " . $e->getMessage());
}

?>
```

---

## 7️⃣ v3_add_comment.php - 댓글 작성

```php
<?php

require 'config.php';
requireLogin();

$post_id = $_POST['post_id'] ?? null;
$content = $_POST['content'] ?? '';

if (!$post_id || empty($content)) {
    header("Location: v3_list.php");
    exit;
}

try {
    $sql = "INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_id, $_SESSION['user_id'], $content]);
  
    header("Location: v3_view.php?id=$post_id");
    exit;
} catch (Exception $e) {
    die("오류: " . $e->getMessage());
}

?>
```

---

## 8️⃣ v3_edit_comment.php - 댓글 수정

```php
<?php

require 'config.php';
requireLogin();

$id = $_GET['id'] ?? null;
$post_id = $_GET['post_id'] ?? null;
$error = '';

if (!$id || !$post_id) {
    header("Location: v3_list.php");
    exit;
}

try {
    $sql = "SELECT * FROM comments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$comment) {
        header("Location: v3_view.php?id=$post_id");
        exit;
    }
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $content = $_POST['content'] ?? '';
  
        if (empty($content)) {
            $error = '댓글 내용을 입력하세요';
        } else {
            $update_sql = "UPDATE comments SET content = ? WHERE id = ?";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([$content, $id]);
  
            header("Location: v3_view.php?id=$post_id");
            exit;
        }
    }
} catch (Exception $e) {
    $error = "오류: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>댓글 수정</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: '맑은 고딕', sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: navy; margin-bottom: 30px; font-size: 22px; }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: '맑은 고딕', sans-serif;
            font-size: 14px;
            resize: vertical;
            min-height: 150px;
        }
        .button-group {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: navy; color: white; }
        .btn-primary:hover { background: #000080; }
        .btn-secondary { background: #888; color: white; }
        .btn-secondary:hover { background: #666; }
        .error { color: red; background: #ffebee; padding: 12px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>✏️ 댓글 수정</h1>
  
    <?php if ($error): ?>
        <div class="error">❌ <?php echo $error; ?></div>
    <?php endif; ?>
  
    <form method="POST">
        <div class="form-group">
            <label for="content">댓글:</label>
            <textarea id="content" name="content" required><?php echo htmlspecialchars($comment['content']); ?></textarea>
        </div>
  
        <div class="button-group">
            <button type="submit" class="btn btn-primary">✅ 수정</button>
            <a href="v3_view.php?id=<?php echo $post_id; ?>" class="btn btn-secondary">⬅️ 취소</a>
        </div>
    </form>
</div>

</body>
</html>
```

---

## 9️⃣ v3_delete_comment.php - 댓글 삭제

```php
<?php

require 'config.php';
requireLogin();

$id = $_GET['id'] ?? null;
$post_id = $_GET['post_id'] ?? null;

if (!$id || !$post_id) {
    header("Location: v3_list.php");
    exit;
}

try {
    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
  
    header("Location: v3_view.php?id=$post_id");
    exit;
} catch (Exception $e) {
    die("오류: " . $e->getMessage());
}

?>
```

---

## 🔟 v3_download.php - 파일 다운로드

**【 11장 새로 추가】**

- 안정적인 파일 다운로드

```php
<?php

require 'config.php';
requireLogin();

try {
    $file_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
  
    if (!$file_id) {
        throw new Exception("파일을 찾을 수 없습니다");
    }
  
    // 파일 정보 조회
    $sql = "SELECT id, original_name, stored_name, file_size FROM attachments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$file_id]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$file) {
        throw new Exception("파일 정보를 찾을 수 없습니다");
    }
  
    // 파일 경로 설정
    $file_path = __DIR__ . '/uploads/files/' . $file['stored_name'];
  
    // 파일 검증
    if (!is_file($file_path)) {
        throw new Exception("서버에 파일이 없습니다");
    }
  
    if (!is_readable($file_path)) {
        throw new Exception("파일을 읽을 수 없습니다");
    }
  
    $file_size = filesize($file_path);
    if (!$file_size) {
        throw new Exception("파일 크기를 확인할 수 없습니다");
    }
  
    // 세션 종료
    session_write_close();
  
    // HTTP 헤더 설정
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $file['original_name'] . '"');
    header('Content-Length: ' . $file_size);
    header('Cache-Control: no-cache, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
  
    // 파일 전송
    readfile($file_path);
    exit;
  
} catch (Exception $e) {
    if (ob_get_contents()) {
        ob_end_clean();
    }
  
    if (!headers_sent()) {
        http_response_code(500);
    }
  
    echo "❌ 다운로드 실패: " . htmlspecialchars($e->getMessage());
    exit;
}

?>
```

---

## 1️⃣1️⃣ v3_delete_attachment.php - 첨부파일 삭제

**【 11장 새로 추가】**

```php
<?php

require 'config.php';
requireLogin();

try {
    $file_id = $_GET['id'] ?? null;
    $post_id = $_GET['post_id'] ?? null;
  
    if (!$file_id || !$post_id) {
        throw new Exception("잘못된 요청입니다");
    }
  
    // 파일 정보 조회
    $sql = "SELECT stored_name FROM attachments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$file_id]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$file) {
        throw new Exception("파일을 찾을 수 없습니다");
    }
  
    // DB에서 삭제
    $delete_sql = "DELETE FROM attachments WHERE id = ?";
    $delete_stmt = $pdo->prepare($delete_sql);
    $delete_stmt->execute([$file_id]);
  
    // 파일 시스템에서 삭제
    $file_path = __DIR__ . '/uploads/files/' . $file['stored_name'];
    if (is_file($file_path)) {
        unlink($file_path);
    }
  
    header("Location: v3_view.php?id=$post_id");
    exit;
} catch (Exception $e) {
    die("오류: " . $e->getMessage());
}

?>
```

---

## 📊 9장 vs 10장 vs 11장 비교

| 기능        | 9장 | 10장           | 11장                |
| ----------- | --- | -------------- | ------------------- |
| 게시글 목록 | ✅  | ✅ + 댓글 수   | ✅ + 댓글 + 파일 수 |
| 게시글 보기 | ✅  | ✅ + 댓글      | ✅ + 댓글 + 파일    |
| 게시글 작성 | ✅  | ✅ 로그인 필수 | ✅ + 파일 업로드    |
| 게시글 수정 | ✅  | ✅ 로그인 필수 | ✅ + 파일 관리      |
| 댓글 기능   | ❌  | ✅ 새로 추가   | ✅                  |
| 파일 첨부   | ❌  | ❌             | ✅ 새로 추가        |
| 로그인      | ❌  | ✅ 필수        | ✅ 필수             |

---

수고했습니다.   
조정현 교수(peterchokr@gmail.com)     영남이공대학교

이 수업자료는 Claude와 Gemini를 이용하여 제작되었습니다.
