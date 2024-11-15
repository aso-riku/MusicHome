<?php
require_once 'common.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header_style.css">
    <link rel="stylesheet" href="../css/login_style.css">
</head>

<body>
    <header>
        <div class="header-inner">
            <a href="top.php" class="logo">Music Home</a>
        </div>
    </header>

    <article class="login">
        <section class="title">
            <h1>Music Home会員ログイン</h1>
        </section>
        <section class="row inner">
            <section class="col-7">
                <form action="top.php" method="post">
                    <div class="row form">
                        <label class="col-3 label">ユーザー名</label>
                        <input class="col-9 text-box" type="text" name="user_name" placeholder="半角英数字"><br>
                    </div>
                    <div class="row form">
                        <label class="col-3 label">パスワード</label>
                        <input class="col-9 text-box" type="password" name="password" placeholder="半角英数字"><br>
                    </div>
                    <div class="button-area">
                        <button type="submit" name="action" value="user" class="btn btn-primary">ログイン</button>
                        <button type="submit" name="action" value="manager" class="btn btn-dark">管理者としてログイン</button>
                    </div>
                </form>
            </section>

            <section class="col-5 ">
                <p>まだMusic Home会員に登録されていない方</p>
                <button onclick="location.href='registration.php'" class="btn btn-outline-dark">会員に新規登録</button>
            </section>

            <section>
                <p>ユーザー名・パスワードを忘れた場合</p>
                <p>ヘルプ</p>
            </section>
        </section>
    </article>
</body>

</html>