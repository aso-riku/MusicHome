<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login_style.css">
    <link rel="stylesheet" href="../css/header_style.css">
</head>

<body>
    <header>
        <div class="header-inner">
            <a href="top.php" class="logo">Music Home</a>
        </div>
    </header>

    <article class="registration">
        <form action="registration_result.php" method="post">
            <section class="title">
                <h1>Music Home会員登録</h1>
            </section>
            <section class="row mail">
                <div class="col-3">
                    <h3>メールアドレス</h3>
                </div>
                <div class="col-1">
                    <h4>必須</h4>
                </div>
                <div class="col-8">
                    <p class="headline">ほかの会員が登録済みのメールアドレスは登録できません</p>
                    <input type="text" name="mail_address1" class="text-box" placeholder=" (例)  〇〇〇〇〇〇@s.asojuku.ac.jp" required><br><br>
                    <p class="headline">確認のためにもう一度入力してください </p>
                    <input type="text" name="mail_address2" class="text-box" placeholder=" (例)  〇〇〇〇〇〇@s.asojuku.ac.jp" required>
                </div>
            </section>

            <section class="row user-name">
                <div class="col-3">
                    <h3>ユーザー名</h3>
                </div>
                <div class="col-1">
                    <h4>必須</h4>
                </div>
                <div class="col-8">
                    <p class="headline">会員向けサービスにログインする際に使用します</p>
                    <input type="radio" name="user_name_flg" value="same">メールアドレスをユーザー名として使用<br>
                    <input type="radio" name="user_name_flg" value="diff">メールアドレス以外をユーザ名として使用
                    <p class="headline">＜6文字以上・半角英数字＞数字だけにすることはできません</p>
                    <input type="text" name="user_name" class="text-box" placeholder=" (例)  MusicHome1234">
                </div>
            </section>

            <section class="row pass">
                <div class="col-3">
                    <h3>パスワード</h3>
                </div>
                <div class="col-1">
                    <h4>必須</h4>
                </div>
                <div class="col-8">
                    <p class="headline">｢ユーザ名｣と同じものは登録できません</p>
                    <input type="password" name="password" class="text-box" placeholder=" ６文字以上 半角英数字" required>
                </div>
            </section>

            <p class="info">お客様の基本情報</p>

            <section class="row name">
                <div class="col-3">
                    <h3>氏名</h3>
                </div>
                <div class="col-1">
                    <h4>必須</h4>
                </div>
                <div class="col-8">
                    (姓) <input type="text" name="sei" class="text-box text-name" placeholder=" (例) 山田" required>　　　
                    (名) <input type="text" name="mei" class="text-box text-name" placeholder=" (例) 太郎" required>
                </div>
            </section>

            <section class="row huri">
                <div class="col-3">
                    <h3>氏名（フリガナ）</h3>
                </div>
                <div class="col-1">
                    <h4>必須</h4>
                </div>
                <div class="col-8">
                    (姓) <input type="text" name="sei_huri" class="text-box text-name" placeholder=" (例) ヤマダ" required>　　　
                    (名) <input type="text" name="mei_huri" class="text-box text-name" placeholder=" (例) タロウ" required>
                </div>
            </section>

            <section class="row address">
                <div class="col-3">
                    <h3>住所</h3>
                </div>
                <div class="col-1">
                    <h4>必須</h4>
                </div>
                <div class="col-8">
                    <div class="side">
                        <div>
                            <label> 郵便番号</label><br>
                            <input type="text" name="post_number" class="text-box" placeholder=" 1234567" required>
                        </div>
                        <div>
                            <label> 都道府県</label><br>
                            <input type="text" name="prefecture" class="text-box" placeholder=" (例) 福岡県" required>
                        </div>
                    </div><br>
                    <label> 市区町村</label><br>
                    <input type="text" name="city" class="text-box" placeholder=" (例) 〇〇市〇〇区" required><br><br>
                    <label> 番地</label><br>
                    <input type="text" name="house_number" class="text-box" placeholder=" (例) 123番地" required><br><br>
                    <label> 建物名・部屋番号</label><br>
                    <input type="text" name="house_name" class="text-box" placeholder=""><br>
                </div>

            </section>

            <section class="error-area">
                <?php
                echo $_SESSION['error_message'] ?? '';
                session_unset();
                ?>
            </section>

            <section class="button-area">
                <button onclick="location.href='login.php'" class="btn btn-outline-dark">戻る</button>
                <button type="submit" name="action" value="registrate" class="btn btn-primary">登録</button>
            </section>
        </form>
    </article>
</body>

</html>