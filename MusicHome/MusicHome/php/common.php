<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../css/products_list.css">

<?php
// サニタイジング
function sanitize($str) {
    return htmlspecialchars($str);
}

// データベース接続
function connect_db() {
    $dsn = 'mysql:host=mysql310.phy.lolipop.lan;
        dbname=LAA1595187-musichome;charset=utf8';
    $username = 'LAA1595187';
    $password = 'Pass0103';

    $pdo = new PDO($dsn, $username, $password);
    return $pdo;
}

// 商品一覧表示
function view_product_list($stmt) {
    // データベース接続
    $pdo = connect_db();

    // 商品画像取得
    echo '<div class="row gap-2">';
    while ($row = $stmt->fetch()) {
            echo '<button type="submit" class="card col-2">
                    <input type="hidden" name="product_id" value="'. $row['product_id']. '">
                    <img  class="img" src="'. $row['image_url']. '" width="180">
                    <p>'. $row['product_name']. '</p>
                    <p>'. $row['price']. '</p>
                </button>';
    }
    echo '</div>';
}
?>