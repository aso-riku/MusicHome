<?php
session_start();

require_once 'common.php';

if (isset($_POST['user'])) {
    // 入力されたユーザー名,パスワード
    $user_name = sanitize($_POST['user_name'] ?? '');
    $password = sanitize($_POST['password'] ?? '');

    // データベース接続
    $pdo = connect_db();

    // ログイン認証
    $sql = $pdo->prepare('SELECT * FROM user WHERE user_name = ? AND password = ?');
    $result = $sql->execute([$user_name, $password]);
    $count = $sql->rowCount();

    if ($result && $count != 0) {
        // ユーザーデータをセッションに保存
        $_SESSION['user']['user_id'] = $sql->fetchColumn(1);
        $_SESSION['user']['user_name'] = $sql->fetchColumn(2);
        echo 'roguin';
    } else {
        //　login.phpにリダイレクト
        $_SESSION['error_message'] = 'ユーザー名かパスワードが間違っています。';
        header("Location:login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="search_result.php" method="get">
        <input type="text" name="keyword">
        <button type="submit" name="action" value="search">検索</button>
    </form>   
</body>
</html>