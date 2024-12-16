<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHome 会員登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/register_user.css">
</head>

<body>
    <div id="overlay-message" class="overlay hidden">
        <p id="overlay-text"></p>
    </div>
    <p class="logo"><a href="top.php">MusicHome</a></p>

    <div id="app" class="register-user">
        <main class="container mt-5 register-user">
            <div class="card mx-auto p-4 shadow-sm" style="max-width: 900px;">
                <h1 class="text-center mb-4">Music Home 会員登録</h1>
                <form action="register_user_result.php" method="post">
                    <!-- メールアドレス -->
                    <div class="mb-4">
                        <label for="mail_address1" class="form-label title-label">メールアドレス <span class="text-danger">必須</span></label>
                        <input type="email" name="mail_address1" v-model="mail_address1" @input="validateEmail" class="form-control" id="mail_address1" placeholder="例: example@s.asojuku.ac.jp" required>
                        <div class="error-message" v-if="errors.mail_address1">{{ errors.mail_address1 }}</div>
                    </div>

                    <!-- ユーザー名 -->
                    <div class="mb-4">
                        <label for="user_name" class="form-label title-label">ユーザー名 <span class="text-danger">必須</span></label>
                        <input type="text" name="user_name" v-model="user_name" @input="validateUserName" class="form-control" id="user_name" placeholder="例: MusicHome1234">
                        <div class="error-message" v-if="errors.user_name">{{ errors.user_name }}</div>
                    </div>

                    <!-- パスワード -->
                    <div class="mb-4">
                        <label for="password" class="form-label title-label">パスワード <span class="text-danger">必須</span></label>
                        <input type="password" name="password1" v-model="password1" @input="validatePassword" class="form-control" id="password" placeholder="6文字以上 半角英数字" required>
                        <div class="error-message" v-if="errors.password1">{{ errors.password1 }}</div>
                        <input type="password" name="password2"  v-model="password2" @input="validatePasswordMatch" class="form-control mt-2" placeholder="確認のためもう一度入力してください" required>
                        <div class="error-message" v-if="errors.password2">{{ errors.password2 }}</div>
                    </div>

                    <!-- 氏名 -->
                    <div class="mb-4">
                        <label class="form-label title-label">氏名 <span class="text-danger">必須</span></label>
                        <div class="d-flex gap-3">
                            <input type="text" name="sei" v-model="sei" class="form-control" placeholder="例: 山田" required>
                            <input type="text" name="mei" v-model="mei" class="form-control" placeholder="例: 太郎" required>
                        </div>
                    </div>

                    <!-- 氏名（フリガナ） -->
                    <div class="mb-4">
                        <label class="form-label title-label">氏名（フリガナ） <span class="text-danger">必須</span></label>
                        <div class="d-flex gap-3">
                            <input type="text" name="sei_huri" v-model="sei_huri" class="form-control" placeholder="例: ヤマダ" required>
                            <input type="text" name="mei_huri" v-model="mei_huri" class="form-control" placeholder="例: タロウ" required>
                        </div>
                    </div>

                    <!-- 住所 -->
                    <div class="mb-4">
                        <label class="form-label title-label">住所 <span class="text-danger">必須</span></label>
                        <div class="row g-2">
                            <!-- 郵便番号 -->
                            <div class="col-md-6">
                                <input type="text" name="post_number" v-model="post_number" @input="validatePostNumber" class="form-control" placeholder="郵便番号 (例: 1234567)" required>
                                <div class="error-message" v-if="errors.post_number">{{ errors.post_number }}</div>
                            </div>
                            <!-- 都道府県 -->
                            <div class="col-md-6">
                                <select name="prefecture" v-model="prefecture" class="form-select" required>
                                    <option value="" selected>選択してください</option>
                                    <option value="" selected>選択してください</option>
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
                                    <!-- 他の都道府県を追加 -->
                                </select>
                            </div>
                        </div>
                        <!-- 市区町村・番地・建物名 -->
                        <div class="mt-3">
                            <input type="text" name="city" v-model="city" class="form-control mb-2" placeholder="市区町村 (例: 新宿区)" required>
                            <input type="text" name="house_number" v-model="house_number" class="form-control mb-2" placeholder="番地 (例: 1丁目1番地)" required>
                            <input type="text" name="house_name" v-model="house_name" class="form-control" placeholder="建物名・部屋番号 (任意)">
                        </div>
                    </div>

                    <!-- ボタン -->
                    <div class="d-flex justify-content-evenly">
                        <button type="submit" name="action" value="back" class="btn btn-outline-secondary back-btn">戻る</button>
                        <button type="submit" :disabled="hasErrors" class="btn btn-primary register-btn" >登録</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="../js/register_user.js"></script>
</body>

</html>