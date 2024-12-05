<?php
session_start();
require_once 'common.php';

// データベース接続
$pdo = connect_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/buy.css">
    <link rel="stylesheet" href="../css/overlay.css">
</head>

<body>
    <?php
    view_header();

    $stmt = $pdo->prepare('SELECT * FROM user WHERE user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);
    $user_data = $stmt->fetch();
    $stmt = $pdo->prepare('SELECT * FROM payment_method WHERE user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);
    $pay = $stmt;
    ?>

    <div id="overlay-message" class="overlay hidden">
        <p id="overlay-text"></p>
    </div>
    <article class="buy">
        <h3 class="title">購入確認</h3>
        <div class="row">
            <div class="col-9">
                <div class="info card">
                    <p class="headline">お届け先</p>
                    <p class="address"><?= $user_data['post_code'] ?>　<?= $user_data['address'] ?></p>
                    <p class="headline">お支払方法</p>
                    <select class="pay">
                        <?php
                        while ($row = $pay->fetch()) {
                            echo '<option>', $row['payment_method'], '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="product-area card">
                    <?php
                    if ($_GET['action'] == "buy-cart") {
                        $stmt = $pdo->prepare('SELECT * FROM cart A JOIN products B ON A.product_id = B.product_id JOIN
                            product_images C ON A.product_id = C.product_id AND image_id = 1 WHERE A.user_id = ?');
                        $stmt->execute([$_SESSION['user']['user_id']]);

                        while ($row = $stmt->fetch()) {
                    ?>
                            <div class="row product">
                                <div class="col-2 image-area">
                                    <img class="img" src="<?= $row['image_url'] ?>">
                                </div>
                                <div class="col-8 detail-area">
                                    <p class="name"><?= $row['product_name'] ?></p>
                                    <p class="volume">数量: <?= $row['volume'] ?></p>
                                </div>
                                <div class="col price-area">
                                    <p >
                                    <p class="price">¥ <?= number_format($row['price']) ?></p>
                                </div>
                            </div>
                            <hr>
                    <?php
                        }
                    } else if ($_GET['action'] == 'buy-now') {
                        $stmt = $pdo->prepare('SELECT * FROM products A JOIN product_images B ON A.product_id = B.product_id AND image_id = 1 WHERE A.product_id = ?');
                        $stmt->execute([$_SESSION['detail']['product_id']]);
                        $row = $stmt->fetch();
                        $volume = $_GET['volume'];
                    ?>

                        <div class="row product">
                            <div class="col-2 image-area">
                                <img class="img" src="<?= $row['image_url'] ?>">
                            </div>
                            <div class="col-8 detail-area">
                                <p class="name"><?= $row['product_name'] ?></p>
                                <p class="volume">数量: <?= $volume ?></p>
                            </div>
                            <div class="col price-area">
                                <p >
                                <p class="price">¥ <?= number_format($row['price']) ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            if ($_GET['action'] == 'buy-cart') {
                $stmt = $pdo->prepare('SELECT SUM(price * volume) FROM cart A JOIN products B ON A.product_id = B.product_id WHERE user_id = ?');
                $stmt->execute([$_SESSION['user']['user_id']]);
                $total_price = $stmt->fetchColumn();
            } else if ($_GET['action'] == 'buy-now') {
                $stmt = $pdo->prepare('SELECT price FROM products WHERE product_id = ?');
                $stmt->execute([$_SESSION['detail']['product_id']]);
                $total_price = $volume * $stmt->fetchColumn();
            }
            ?>
            <div class="col card buy-area">
                <div class="flex">
                    <div class="syokei">商品の小計：</div>
                    <div class="total-price">¥ <?= number_format($total_price) ?></div>
                </div>
                <div class="flex">
                    <div>配送料・手数料：</div>
                    <div>¥ 0</div>
                </div>
                <hr class=".hr">
                <div class="flex">
                    <div class="seikyu">ご請求額</div>
                    <div class="seikyu-price">¥ <?= number_format($total_price) ?></div>
                </div>

                <button type="button" class="btn buy-btn" id="buy-btn" value="<?= $_GET['action'] ?>"
                    data-product-id="<?= $_SESSION['detail']['product_id'] ?>">購入確定</button>
                <input type="hidden" id="volume" value="<?= $volume ?>">
            </div>
        </div>
    </article>

    <script src="../js/buy.js"></Script>
</body>

</html>