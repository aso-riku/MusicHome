<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
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
    <link rel="stylesheet" href="../css/products_list.css">

</head>

<body>
    <?php
    require_once 'common.php';
    // データベース接続
    $pdo = connect_db();

    // ヘッダー表示
    view_header();
    ?>

    <article class="favorite">
        <form action="details_user.php" method="get">
            <?php
            echo '<h4>', $_SESSION['user']['user_name'], ' さんのお気に入り</h4>';

            $stmt = $pdo->prepare('SELECT * FROM favorite A LEFT OUTER JOIN products B ON A.product_id = B.product_id LEFT OUTER JOIN product_images C ON A.product_id = C.product_id AND image_id = 1 WHERE user_id = ?');
            $stmt->execute([$_SESSION['user']['user_id']]);

            view_product_list($stmt);
            ?>
        </form>
    </article>
</body>

</html>