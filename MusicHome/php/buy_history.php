<?php
session_start();

require_once 'common.php';
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
    <link rel="stylesheet" href="../css/buy_history.css">
</head>

<body>
    <?php
    view_header();

    $pdo = connect_db();
    ?>

    <div class="buy_history">
        <h3><?= $_SESSION['user']['user_name'] ?>さんの購入履歴</h3>

    <?php
    $stmt = $pdo->prepare('SELECT * FROM sales WHERE user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);

    while ($sale = $stmt->fetch()) {
        $stmt2 = $pdo->prepare('SELECT * FROM sales_receipt A JOIN products B ON A.product_id = B.product_id JOIN
            product_images C ON A.product_id = C.product_id AND image_id = 1 WHERE A.sales_number = ?');
        $stmt2->execute([$sale['sales_number']]);

        $date = new DateTime($sale['sales_date']);
        echo '<h4>', $date->format('Y年m月d日'),'</h4>';
        echo '<div class="product-area card">';

        while ($row = $stmt2->fetch()) {
            $stmt3 = $pdo->prepare('SELECT SUM(volume) AS total_volume, SUM(price * volume) AS total_price FROM sales_receipt A JOIN products B ON A.product_id = B.product_id
                WHERE sales_number = ?');
            $stmt3->execute([$sale['sales_number']]);
            $total = $stmt3->fetch();
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
                    <p>
                    <p class="price">¥ <?= number_format($row['price']) ?></p>
                </div>
            </div>
            <hr>
    <?php
        }
        echo '<div class="total">
                <span>合計 </span>
                <span>', $total['total_volume'],' 点　　</span>
                <span class="total-price">¥ ', $total['total_price'], '</span>
             </div>';
        echo '</div>';
    }
    ?>

    </div>
</body>

</html>