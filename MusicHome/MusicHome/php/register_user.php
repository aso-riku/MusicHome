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
        <form action="register_user_result.php" method="post">
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
                            <select name="prefecture" class="prefecture">
                                <option value="北海道">北海道</option>
                                <option value="青森県">青森県</option>
                                <option value="岩手県">岩手県</option>
                                <option value="宮城県">宮城県</option>
                                <option value="秋田県">秋田県</option>
                                <option value="山形県">山形県</option>
                                <option value="福島県">福島県</option>
                                <option value="茨城県">茨城県</option>
                                <option value="栃木県">栃木県</option>
                                <option value="群馬県">群馬県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>
                                <option value="石川県">石川県</option>
                                <option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>
                                <option value="長野県">長野県</option>
                                <option value="岐阜県">岐阜県</option>
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                                <option value="三重県">三重県</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="京都府">京都府</option>
                                <option value="大阪府">大阪府</option>
                                <option value="兵庫県">兵庫県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                                <option value="徳島県">徳島県</option>
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <option value="高知県">高知県</option>
                                <option value="福岡県">福岡県</option>
                                <option value="佐賀県">佐賀県</option>
                                <option value="長崎県">長崎県</option>
                                <option value="熊本県">熊本県</option>
                                <option value="大分県">大分県</option>
                                <option value="宮崎県">宮崎県</option>
                                <option value="鹿児島県">鹿児島県</option>
                                <option value="沖縄県">沖縄県</option>
                            </select>
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
                <button type="submit" name="action" value="register" class="btn btn-primary">登録</button>
            </section>
        </form>
    </article>
</body>

</html>