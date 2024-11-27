<?php
session_start();
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
    <link rel="stylesheet" href="../css/products_list.css">
</head>
<body>
    <?php
    require_once 'common.php';

    // ヘッダー表示
    view_header();
    ?>


    <article class="search_result">
        <form action="details_user.php" method="get">
            <?php
            require_once 'common.php';

            // データベース接続
            $pdo = connect_db();

            // 入力されたkeyword
            $keyword = sanitize($_GET['keyword']) ?? '';

            echo '<h4>', $keyword, ' の検索結果</h4>';

            // keywordをもとにデータベースから検索
            $stmt = $pdo->prepare('SELECT * FROM products A JOIN product_images B ON A.product_id = B.product_id AND image_id = 1 WHERE A.product_id = ? OR product_name LIKE ? OR product_detail LIKE ? OR brand_name = ?');
            $result = $stmt->execute([$keyword, '%'.$keyword.'%', '%'.$keyword.'%', $keyword]);
            $count = $stmt->rowCount();

            // 該当商品が存在しない場合
            if (!$result || $count == 0) {
                echo '<p class="not-exist">該当商品がありません</p>';
            // 該当商品が存在する場合
            } else {
                // 商品を表示
                view_product_list($stmt);
            }
            
            ?>
        </form>
    </article>
</body>
</html>