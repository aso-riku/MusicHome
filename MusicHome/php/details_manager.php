<?php
session_start();
require_once 'common.php';

// データベースに接続
$pdo = connect_db();

// 選択された商品ID
$product_id = $_GET['product_id'];

// 商品詳細を取得
$stmt = $pdo->prepare('SELECT * FROM products A LEFT OUTER JOIN product_images B ON A.product_id = B.product_id AND image_id = 1 
    LEFT OUTER JOIN inventory C ON A.product_id = C.product_id LEFT OUTER JOIN genre D on A.genre_id = D.genre_id WHERE A.product_id = ?');
$stmt->execute([$product_id]);
$_SESSION['detail'] = $stmt->fetch();
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
    <link rel="stylesheet" href="../css/details_style.css">
</head>

<body>
    <?php
    // ヘッダーを表示
    view_header_manager();
    ?>

    <article class="details">
        <section class="row gap-3 product-area">
            <div class="col image-area">
                <div class="row">
                    <div class="col-2 sub-img-area">
                        <?php
                        $stmt = $pdo->prepare('SELECT image_url FROM product_images WHERE product_id = ? AND image_id > 1');
                        $stmt->execute([$_SESSION['detail']['product_id']]);

                        while ($row = $stmt->fetch()) {
                            echo '<img class="sub-img" src="', $row['image_url'], '">';
                        }
                        ?>
                    </div>
                    <div class="col-10 main-img-area">
                        <img class="main-img" src="<?= $_SESSION['detail']['image_url'] ?>">
                    </div>
                </div>
            </div>
            <div class="col detail-area">
                <p class="genre"><?= $_SESSION['detail']['genre_name'] ?></p>
                <p class="name"><?= $_SESSION['detail']['product_name'] ?></p>
                <div class="row">
                    <p class="col brand"><?= $_SESSION['detail']['brand_name'] ?></p>
                    <p class="col evaluation">
                        <?php
                        echo avg_evaluation($_SESSION['detail']['product_id']);
                        ?>
                    </p>
                </div>
                <hr class="hr1">
                <p class="price">¥ <?= number_format($_SESSION['detail']['price']) ?></p>
                <?php
                if ($_SESSION['detail']['inventory_volume'] > 3) {
                    echo '<p class="in-stock">在庫あり</p>';
                } else {
                    echo '<p class="out-stock">残り', $_SESSION['detail']['inventory_volume'], '点</p>';
                }
                ?>
                </p>
                <p class="LT">
                    <?php
                    $lt = $_SESSION['detail']['lead_time'];
                    $date = date('m月d日', strtotime("+$lt days"));
                    echo $date, 'にお届け';
                    ?>
                </p>
                <div class="btn-area">
                    <form action="inventory.php" method="get">
                        <button type="submit" class="btn inventory" name="action" value="inventory">在庫管理</button>
                    </form>
                    <form action="product_edit.php" method="get">
                        <button class="btn edit">商品情報編集</button>
                    </form>
                </div>
                <hr class="hr2">
                <p class="detail-title">この商品について</p>
                <p class="detail"><?= $_SESSION['detail']['product_detail'] ?></p>
            </div>
        </section>

        <hr class="hr3">

        <section class="review-area">
            <p class="review-title">レビュー</p>

            <?php
            $stmt = $pdo->prepare('SELECT * FROM review A JOIN user B ON A.user_id = B.user_id WHERE product_id = ? AND review_body <> ""');
            $stmt->execute([$_SESSION['detail']['product_id']]);

            while ($review = $stmt->fetch()) {
                echo '<div class="review">
                        <p class="reviewer-name">', $review['user_name'], '</p>
                        <p class="review-evalution">★★★★☆</p>
                        <p class="review-body">', $review['review_body'], '<p>
                      </div>';
            }
            ?>
        </section>
    </article>
    <script src="../js/script.js"></script>
</body>

</html>