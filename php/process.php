<?php
require_once 'common.php';
    
// データベース接続
$pdo = connect_db();

// ログイン
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザーログイン
    if ($_POST['action'] == 'login_user') {
        // 入力されたユーザー名,パスワード
        $user_name = sanitize($_POST['user_name'] ?? '');
        $password = sanitize($_POST['password'] ?? '');

        // ログイン認証
        $stmt = $pdo->prepare('SELECT * FROM user WHERE user_name = ? AND password = ?');
        $result = $stmt->execute([$user_name, $password]);
    
        if ($result) {
            $user_data = $stmt->fetch();
            if ($user_data) {
                // ユーザーデータをセッションに保存
                $_SESSION['user']['user_id'] = $user_data['user_id'];
                $_SESSION['user']['user_name'] = $user_data['user_name'];
        
                // top.phpにリダイレクト
                header("Location:top.php");
                exit();
            } else {
                // login.phpにリダイレクト
                $_SESSION['error_message'] = 'ユーザー名かパスワードが間違っています。';
                header("Location:login.php");
                exit();
            }
        }
    }
}
?>