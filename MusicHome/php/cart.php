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
</head>
<body>
    <?php
    view_header();
    ?>

    <article class="cart">
        <div class="row">
            <div class="col-9 product-area card">
                <?php
                $stmt = $pdo->prepare('SELECT * FROM cart A JOIN products B ON A.product_id = B.product_id JOIN
                    product_images C ON A.product_id = C.product_id AND image_id = 1 WHERE A.user_id = ?');
                $stmt->execute([$_SESSION['user']['user_id']]);

                while ($row = $stmt->fetch()) {
                    echo '<div class="row product">
                            <div class="col-4 image-area">
                                <img src="', $row['image_url'], '">
                            </div>
                            <div class="col-8 detail-area">
                            
                            </div>
                          </div>';
                }
                ?>
            </div>
            <div class="col-3 buy-area card">

            </div>
        </div>
    </article>
</body>
</html>