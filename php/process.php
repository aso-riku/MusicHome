<?php
session_start();
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



// カートに入れるボタン押下
if ($_GET['action'] == 'cart') {

    $volume = (int)$_GET['volume'] ?? '';
    // ログインしていない場合 login.php にリダイレクト
    if (!isset($_SESSION['user']['user_id'])) {
        header("Location:login_php");
        exit();
    }
    // すでにカートに入っていた場合、数量を増やす
    $stmt = $pdo->prepare('SELECT cart_number FROM cart WHERE user_id = ? AND product_id = ?');
    $result = $stmt->execute([$_SESSION['user']['user_id'], $_SESSION['detail']['product_id']]);

    if ($stmt->fetch()) {
        $stmt = $pdo->prepare('UPDATE cart SET volume = volume + ? WHERE user_id = ? AND product_id = ?');
        $update_result = $stmt->execute([$volume, $_SESSION['user']['user_id'], $_SESSION['detail']['product_id']]);

        header("Location: details_user.php?product_id=" . $_SESSION['detail']['product_id']);
        exit();
    } else {
        // カートに入れる
        $stmt = $pdo->prepare('SELECT MAX(cart_number) FROM cart WHERE user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $cart_number = $stmt->fetchColumn() + 1;
        $stmt = $pdo->prepare('INSERT INTO cart VALUES(?,?,?,?)');
        $stmt->execute([$_SESSION['user']['user_id'], $cart_number, $_SESSION['detail']['product_id'], $volume]);
        header("Location: details_user.php?product_id=" . $_SESSION['detail']['product_id']);
        exit();
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

if ($_GET['action'] == 'favorite') {
    // データベースに接続
    $pdo = connect_db();

    $stmt = $pdo->prepare('SELECT * FROM favorite WHERE user_id = ? AND product_id = ?');
    $stmt->execute([$_SESSION['user']['user_id'], $_SESSION['detail']['product_id']]);

    // お気に入りにすでに登録している
    if ($stmt->fetch()) {
        $stmt = $pdo->prepare('DELETE FROM favorite WHERE user_id = ? AND product_id = ?');
        $stmt->execute([$_SESSION['user']['user_id'], $_SESSION['detail']['product_id']]);
    // お気に入りに登録していない
    } else {
        $stmt = $pdo->prepare('INSERT INTO favorite VALUES(?,?)');
        $stmt->execute([$_SESSION['user']['user_id'], $_SESSION['detail']['product_id']]);
    }

    header("Location: details_user.php?product_id=" . $_SESSION['detail']['product_id']);
    exit();    
}
