<?php
session_start();
require_once 'common.php';
$pdo = connect_db();
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
    <link rel="stylesheet" href="../css/register_product_style.css">
    <link rel="stylesheet" href="../css/overlay.css">
</head>

<body>
    <?php
    view_header_manager();

    $stmt = $pdo->prepare('SELECT * FROM products A LEFT OUTER JOIN inventory B ON A.product_id = B.product_id
        LEFT OUTER JOIN product_images C ON A.product_id = C.product_id AND C.image_id = 1 LEFT OUTER JOIN genre D ON A.genre_id = D.genre_id WHERE A.product_id = ?');
    $stmt->execute([$_SESSION['detail']['product_id']]);
    $product_data = $stmt->fetch();
    ?>

    <div id="overlay-message" class="overlay hidden">
        <p id="overlay-text"></p>
    </div>
    <article class="register-product">
        <p class="title">商品情報編集</p>
        <div class="container outline">
            <div class="outline-title">
                <p>商品情報入力</p>
            </div>

            <div class="input-area">
                <div class="row name-area">
                    <div class="col-2">
                        <p class="headline">商品名</p>
                    </div>
                    <div class="col-1">
                        <p class="require">必須</p>
                    </div>
                    <div class="col-9">
                        <input type="text" name="product_name" class="text-box" value="<?= $product_data['product_name'] ?>">
                    </div>
                </div>

                <div class="row brand-area">
                    <div class="col-2">
                        <p class="headline">ブランド</p>
                    </div>
                    <div class="col-1">
                        <p class="require">必須</p>
                    </div>
                    <div class="col-9">
                        <input type="text" name="brand" class="text-box" value="<?= $product_data['brand_name'] ?>">
                    </div>
                </div>

                <div class="row genre-select-area">
                    <div class="col-2">
                        <p class="headline">ジャンル</p>
                    </div>
                    <div class="col-1">
                        <p class="require">必須</p>
                    </div>
                    <div class="col-9">
                        <?php
                        $stmt = $pdo->prepare('SELECT genre_name, A.genre_id FROM products A JOIN genre B ON A.genre_id = B.genre_id WHERE product_id = ?');
                        $stmt->execute([$_SESSION['detail']['product_id']]);
                        $row = $stmt->fetch();
                        ?>

                        <p id="old-genre-name"><?= $row['genre_name'] ?></p>
                        <input type="hidden" id="old-genre-id" name="old_genre_id" value="<?= $row['genre_id'] ?>">
                        <div class="genre-area">
                            <select name="genre_id[]" id="genre-1" class="form-control genre-select">
                                <option value="">選択してください</option>
                                <?php
                                foreach ($pdo->query('SELECT * FROM genre') as $genre) {
                                    if ($genre['higher_genre_id'] == '') { // 最上位ジャンルのみ
                                        echo '<option value="', $genre['genre_id'], '">', $genre['genre_name'], '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row price-area">
                    <div class="col-2">
                        <p class="headline">金額</p>
                    </div>
                    <div class="col-1">
                        <p class="require">必須</p>
                    </div>
                    <div class="col-9">
                        <input type="text" name="price" class="text-box center" value="<?= $product_data['price'] ?>"> 円
                    </div>
                </div>

                <div class="row detail_area">
                    <div class="col-2">
                        <p class="headline">商品詳細</p>
                    </div>
                    <div class="col-1">
                        <p class="require">必須</p>
                    </div>
                    <div class="col-9">
                        <textarea name="detail" class="detail"><?= $product_data['product_detail'] ?></textarea>
                    </div>
                </div>

                <?php
                $stmt = $pdo->prepare('SELECT image_url FROM product_images WHERE product_id = ? AND image_id > 1');
                $stmt->execute([$_SESSION['detail']['product_id']]);
                $row = $stmt->fetch();
                ?>

                <div>
                    <div class="row img-area">
                        <div class="col-2">
                            <p class="headline">商品画像</p>
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row main-img-area">
                        <div class="col-2">
                            <p class="headline">メイン画像</p>
                        </div>
                        <div class="col-1">
                            <p class="require">必須</p>
                        </div>
                        <div class="col-9">
                            <input type="input" name="main_image" class="text-box" value="<?= $product_data['image_url'] ?>">
                        </div>
                    </div>

                    <div class="row sub-img-area">
                        <div class="col-2">
                            <p class="headline">サブ画像</p>
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-9">
                            <input type="input" name="sub_image[]" class="text-box" value="<?= $row['image_url'] ?>">
                        </div>
                    </div>

                    <?php
                    while ($row = $stmt->fetch()) {
                    ?>
                        <div class="row sub-img-area">
                            <div class="col-2">
                                <p class="headline">　</p>
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-9">
                                <input type="input" name="sub_image[]" class="text-box" value="<?= $row['image_url'] ?>">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <button type="button" class="btn btn-outline-dark add">サブ画像追加</button>

                <div class="row inventory-area">
                    <div class="col-2">
                        <p class="headline">在庫数</p>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-9">
                        <input type="text" name="inventory" class="text-box center" value="<?= $product_data['inventory_volume'] ?>"> 個
                    </div>
                </div>

                <div class="row LT-area">
                    <div class="col-2">
                        <p class="headline">リードタイム</p>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        <input type="text" name="LT" class="text-box center" value="<?= $product_data['lead_time'] ?>"> 日
                    </div>
                </div>

                <div class="button-area">
                    <button type="button" class="btn update">変更</button>
                    <button type="button" class="btn delete">削除</button>
                </div>
            </div>
        </div>
    </article>

    <script src="../js/product_edit.js"></script>
</body>

</html>