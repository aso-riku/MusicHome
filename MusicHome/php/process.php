<?php
session_start();
require_once 'common.php';

// データベース接続
$pdo = connect_db();

// ログイン ユーザー
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
    // ログイン　管理者
    } else if ($_POST['action'] == 'login_manager') {
        // 入力されたユーザー名,パスワード
        $manager_name = sanitize($_POST['user_name'] ?? '');
        $password = sanitize($_POST['password'] ?? '');

        // ログイン認証
        $stmt = $pdo->prepare('SELECT * FROM manager WHERE manager_name = ? AND password =?');
        $result = $stmt->execute([$manager_name, $password]);

        if ($result) {
            $manager_data = $stmt->fetch();
            if ($manager_data) {
                // 管理者データをセッションに保存
                $_SESSION['manager']['manager_id'] = $manager_data['manager_id'];
                $_SESSION['manager']['manager_name'] = $manager_data['manager_name'];

                // top_manager.phpにリダイレクト
                header("Location:top_manager.php");
                exit();
            }
        }
    }
}

// レビューを投稿ボタンを押下
if ($_GET['action'] == "post") {
    // 入力された値
    $evaluation = (int)$_GET['evaluation'];
    $review_body = sanitize($_GET['review_body'] ?? NULL);

    // データベースに追加
    $stmt = $pdo->prepare('SELECT MAX(review_number) AS MAX_number FROM review WHERE product_id = ?');
    $stmt->execute([$_SESSION['detail']['product_id']]);
    if ($row = $stmt->fetch()) {
        $review_number = $row['MAX_number'] + 1;
    } else {
        $review_number = 1;
    }

    $stmt = $pdo->prepare('INSERT INTO review VALUES(?,?,?,?,?)');
    $stmt->execute([$_SESSION['detail']['product_id'], $review_number, $evaluation, $review_body, $_SESSION['user']['user_id']]);
    header("Location: details_user.php?product_id=" . $_SESSION['detail']['product_id']);
    exit();
}
