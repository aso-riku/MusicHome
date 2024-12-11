<?php
session_start();
require_once 'common.php';

// データベースに接続
$pdo = connect_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/inventory.css">
    <link rel="stylesheet" href="../css/overlay.css">
    <title>Document</title>
</head>

<body>
    <?php
    view_header_manager();

    $stmt = $pdo->prepare('SELECT * FROM products A LEFT OUTER JOIN product_images B ON A.product_id = B.product_id AND image_id = 1
        LEFT OUTER JOIN inventory C ON A.product_id = C.product_id WHERE A.product_id = ?');
    $stmt->execute([$_SESSION['detail']['product_id']]);
    $data = $stmt->fetch();
    ?>

    <div id="overlay-message" class="overlay hidden">
        <p id="overlay-text"></p>
    </div>
    <article class="inventory">
        <div class="row">
            <div class="col-5 iamge-area">
                <img class="img" src="<?= $data['image_url'] ?>">
            </div>
            <div class="col detail-area">
                <p class="name"><?= $data['product_name'] ?></p>
                <p class="inventory-volume">在庫：<b><?= $data['inventory_volume'] ?></b> 個</p>
                更新数量：<input type="number" id="volume" class="input-volume" value="1" min="1">
                <div class="btn-area">
                    <button class="btn inventory-btn plus" value="plus">増やす</button>
                    <button class="btn inventory-btn minus" value="minus">減らす</button>
                </div>
            </div>
        </div>
    </article>

    <script src="../js/inventory.js"></script>
</body>

</html>