<?php
session_start();

require_once 'common.php';

// 入力されたメールアドレス
$mail_address1 = sanitize($_POST['mail_address1'] ?? '');

// メールアドレスのフォーマットを検証

if (!filter_var($mail_address1, FILTER_VALIDATE_EMAIL)) {
    // registration.php にリダイレクト
    $_SESSION['error_message'] = 'メールアドレスが有効ではありません。';
    header("Location:register_user.php");
    exit();
}


// 入力されたユーザー名

$user_name = sanitize($_POST['user_name'] ?? '');
// ユーザー名のフォーマットを検証
if (!preg_match('/^(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$/', $user_name)) {
    // registration.php にリダイレクト
    $_SESSION['error_message'] = 'ユーザー名が有効ではありません。';
    header("Location:register_user.php");
    exit();
}

// 入力されたパスワード
$password1 = sanitize($_POST['password1']);
$password2 = sanitize($_POST['password2']);

if ($password1 == $password2) {
    if (!preg_match('/^[a-zA-Z0-9]{6,}$/', $password1)) {
        // registration.php にリダイレクト
        $_SESSION['error_message'] = 'パスワードが有効ではありません。';
        header("Location:register_user.php");
        exit();
    }
} else {
    $_SESSION['error_message'] = 'パスワードが異なります';
    header("Location:register_user.php");
    exit();
}

// 入力された氏名
$sei = sanitize($_POST['sei']);
$mei = sanitize($_POST['mei']);
$sei_huri = sanitize($_POST['sei_huri']);
$mei_huri = sanitize($_POST['mei_huri']);
$real_name = $sei . $mei;

// 入力された住所
$post_number = sanitize($_POST['post_number']);
$prefecture = sanitize($_POST['prefecture']);
$city = sanitize($_POST['city']);
$house_number = sanitize($_POST['house_number']);
$house_name = sanitize($_POST['hosue_name'] ?? '');
$address = $prefecture . $city . $house_number . $house_name;

// 郵便番号のフォーマットを検証
if (!preg_match('/^\d{7}$/', $post_number)) {
    // registration.php にリダイレクト
    $_SESSION['error_message'] = '郵便番号が有効ではありません。';
    header("Location:register_user.php");
}

// データベース接続
$pdo = connect_db();

// メールアドレスの重複の検証
$stmt = $pdo->prepare('SELECT COUNT(*) FROM user WHERE mail_address = ?');
$stmt->execute([$_POST['mail_address1']]);

if ($stmt->fetchColumn() == 0) {
    // 登録
    $stmt = $pdo->prepare('INSERT INTO user(user_name, real_name, address, mail_address, password) VALUES (?,?,?,?,?)');
    $result = $stmt->execute([$user_name, $real_name, $address, $mail_address1, $password1]);
} else {
    // registration にリダイレクト
    $_SESSION['error_message'] = 'このメールアドレスは既に登録されています。';
    header("Location:register_user.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/login_style.css">
</head>

<body>
    <header>
        <div class="header-inner">
            <a href="top.php" class="logo">Music Home</a>
        </div>
    </header>

    <article class="regi_result">
        <section>
            <h1>登録完了</h1>
        </section>
        <section>
            <button onclick="location.href='login.php'" class="btn btn-primary">ログイン</button>
        </section>
    </article>
</body>

</html>