<?php
session_start();
if ($_GET['action'] ?? '' == 'logout') {
    session_unset();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/login_style.css">
</head>

<body>
    <?php
    require_once 'common.php';
    ?>
    <p class="logo"><a href="top.php">MusicHome</a></p>
    <article class="login">
        <section class="title">
            <h1>LOGIN</h1>
        </section>
        <section class="row inner">
            <!-- ログインフォーム -->
            <section class="col-6 form">
                <form action="process.php" method="post">
                    <div class="cp_iptxt">
                        <input class="ef" type="text" name="user_name" placeholder="">
                        <label>ユーザー名</label>
                        <span class="focus_line"><i></i></span>
                    </div>
                    <div class="cp_iptxt">
                        <input class="ef" type="password" name="password" placeholder="">
                        <label>パスワード</label>
                        <span class="focus_line"><i></i></span>
                    </div>
                    <div class="button-area">
                        <button type="submit" name="action" value="login_user" class="btn btn-dark">ログイン</button>
                        <button type="submit" name="action" value="login_manager" class="btn btn-dark">管理者としてログイン</button>
                    </div>
                    <p class="forgot-password"><a href="#">パスワードをお忘れの方はこちら »</a></p>
                </form>
            </section>

            <!-- 新規登録セクション -->
            <section class="col register-section">
                <h2>はじめてご利用の方</h2>
                <p>お買い物には会員登録が必要です</p>
                <button onclick="location.href='register_user.php'" class="btn btn-outline-dark">新規会員登録</button>
            </section>
        </section>
    </article>
</body>

</html>