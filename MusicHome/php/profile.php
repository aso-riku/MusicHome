<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'common.php';
session_start();

if (!isset($_SESSION['user']['user_id'])) {
    header('Location: login.php'); // セッションが空ならログインページにリダイレクト
    exit;
}

$user_id = $_SESSION['user']['user_id']; // セッションからユーザーIDを取得

$pdo = connect_db();

// 現在のユーザー情報を取得
$stmt = $pdo->prepare('SELECT user_name, mail_address, address FROM user WHERE user_id = ?');
$stmt->execute([$user_id]);
$user_info = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user_info) {
    echo 'ユーザー情報が見つかりません。';
    exit;
}

// 更新処理
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'] ?? $user_info['user_name'];
    $mail_address = $_POST['mail_address'] ?? $user_info['mail_address'];
    $address = $_POST['address'] ?? $user_info['address'];

    try {
        // ユーザー情報を更新
        $stmt = $pdo->prepare('UPDATE user SET user_name = ?, mail_address = ?, address = ? WHERE user_id = ?');
        $stmt->execute([$user_name, $mail_address, $address, $user_id]);

        $stmt = $pdo->prepare('SELECT user_id, user_name FROM user WHERE user_id = ? ');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $row = $stmt->fetch();
        $_SESSION['user']['user_id'] =  $row['user_id'];
        $_SESSION['user']['user_name'] = $row['user_name'];

        $message = '更新が完了しました！';
        // 最新の情報を再取得
        $user_info = compact('user_name', 'mail_address', 'address');
    } catch (Exception $e) {
        $message = '更新に失敗しました: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/icon.css">
</head>
<body>
    <?php view_header(); ?>

    <div class="container icon">
        <div class="navigation">
            <a href="top.php" class="btn btn-outline-dark">トップページに戻る</a>
        </div>

        <h1 class="page-title">ユーザー情報</h1>

        <?php if ($message): ?>
            <div class="alert-message">
                <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <div class="user-card">
            <form action="profile.php" method="post" class="user-form">
                <div class="form-group">
                    <label for="user_name">ユーザー名</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" 
                           value="<?php echo htmlspecialchars($user_info['user_name'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="form-group">
                    <label for="mail_address">メールアドレス</label>
                    <input type="email" id="mail_address" name="mail_address" class="form-control" 
                           value="<?php echo htmlspecialchars($user_info['mail_address'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" id="address" name="address" class="form-control" 
                           value="<?php echo htmlspecialchars($user_info['address'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">更新する</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
