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
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/overlay.css">
</head>
<body>
    <?php
    view_header();

    $stmt = $pdo->prepare('SELECT * FROM cart A JOIN products B ON A.product_id = B.product_id JOIN product_images C ON A.product_id = C.product_id
    AND image_id = 1 JOIN inventory D ON A.product_id = D.product_id WHERE A.user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);
    $count = $stmt->rowCount();
    ?>

    <div id="overlay-message" class="overlay hidden">
        <p id="overlay-text"></p>
    </div>
    <article class="cart">
        <?php
        if ($count == 0) {
            echo '<h3 class="empty-cart">カートは空です</h3>';
        } else {
            echo '<h3 class="user">', $_SESSION['user']['user_name'], 'さんのカート</h3>';
        ?>
        <div class="row gap-2">
            <div class="col-9 product-area card">
                <?php
                while ($row = $stmt->fetch()) {
                ?>
                    <div class="row product" id="product-<?= $row['product_id'] ?>">
                        <div class="col-3 image-area">
                            <img src="<?= $row['image_url'] ?>">
                        </div>
                        <div class="col detail-area">
                            <div class="row">
                                <div class="col">
                                    <p class="name"><?= $row['product_name'] ?></p>
                                    <?php
                                    if ($row['inventory_volume'] > 3) {
                                        echo '<p class="in-stock">在庫あり</p>';
                                    } else {
                                        echo '<p class="out-stock">残り', $row['inventory_volume'], '点</p>';
                                    }
                                    
                                    $lt = $row['lead_time'];
                                    $date = date('m月d日', strtotime("+$lt days"));
                                    echo '<p class="lt">', $date, 'にお届け</p>';
                                    ?>
                                
                                </div>
                                <div class="col-3 price-area">
                                    <p class="price">¥ <?= number_format($row['price']) ?></p>
                                </div>
                            </div>
                            <span class="button-area">                      
                                <div>数量：<input class="volume-input" type="number" name="volume" value="<?= $row['volume'] ?>" min="1"
                                    max="<?= $row['inventory_volume'] ?>" data-product-id="<?= $row['product_id'] ?>"></div>
                                <button type="button" class="btn delete delete-btn" data-product-id="<?= $row['product_id'] ?>">削除</button>
                            </span>
                        </div>
                    </div>
                    <hr id="hr-<?= $row['product_id'] ?>">   
                <?php                    
                }
                ?>
            </div>
            <div class="col buy-area card">
                <?php
                    $stmt = $pdo->prepare('SELECT SUM(volume) FROM cart WHERE user_id = ?');
                    $stmt->execute([$_SESSION['user']['user_id']]);
                    $count = $stmt->fetchColumn();

                    $stmt = $pdo->prepare('SELECT SUM(price * volume) FROM cart A JOIN products B ON A.product_id = B.product_id 
                        WHERE user_id = ? GROUP BY A.user_id');
                    $stmt->execute([$_SESSION['user']['user_id']]);
                    $total_price = $stmt->fetchColumn();
                ?>

                <p class="total-item">合計 (<?= $count ?> 個の商品)</p>
                <p class="total-price">¥ <?= number_format($total_price) ?></p>

                <form action="buy.php" method="get">
                    <button class="btn buy" name="action" value="buy-cart" type="submit">レジに進む</button> 
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </article>
    <script src="../js/script.js"></script>
</body>
</html>