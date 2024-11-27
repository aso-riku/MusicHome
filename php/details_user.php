<<<<<<< HEAD:php/details_user.php
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
    require_once 'common.php';

    // ヘッダーを表示
    view_header();
    ?>

    <article class="details">
        <section class="row gap-3 product-area">
            <div class="col image-area">
                <div class="row">
                    <div class="col-2 sub-img-area">

                        <img class="sub-img" src="https://m.media-amazon.com/images/I/71aAmkQnQHL._AC_SX569_.jpg">
                        <img class="sub-img" src="https://m.media-amazon.com/images/I/61oVK9reYwL._AC_SX569_.jpg">
                        <img class="sub-img" src="https://m.media-amazon.com/images/I/418BFOFLzcL._AC_US40_.jpg">

                    </div>
                    <div class="col-10 main-img-area">
                        <img class="main-img" src="https://m.media-amazon.com/images/I/61XOFGAateL._AC_SX569_.jpg">
                    </div>
                </div>
            </div>
            <div class="col detail-area">
                <p class="name">American Vintage II 1961 Stratocaster RW Olympic White</p>
                <div class="row">
                <p class="col brand">FENDER</p>
                <p class="col evaluation">★★★★☆</p>
                </div>
                <hr class="hr1">
                <p class="price">¥ 298,000</p>
                <p class="inventory">在庫あり</p>
                <p class="LT">11月21日（木）にお届け</p>
                <div class="btn-area">
                    数量：
                    <select name="volume" class="volume">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <button class="btn cart">カートに入れる</button>
                    <button class="btn buy">今すぐ買う</button>
                </div>
                <hr class="hr2">
                <p class="detail-title">この商品について</p>
                <p class="detail">American Vintage IIは、音楽の歴史を変えたギターとベースを当時の仕様で忠実に再現し、歴史のある本物のFENDERトーンにこだわったシリーズです。アルダーボディに、スラブローズ指板を採用し、ピックアップにはPure Vintage '61 Single-Coil Stratを搭載。人気の頂点に君臨する60年代ストラトです。</p>
            </div>
        </section>

        <hr class="hr3">

        <section class="review-area">
            <p class="review-title">レビュー</p>
            <div class="post-review-area">
                <p class="post-review-title">レビューを書く</p>
                <p class="post-evalution">☆☆☆☆☆</p>
                <textarea class="post-review-body"></textarea>
            </div>
            <div class="review">
                <p class="reviewer-name">はると</p>
                <p class="review-evalution">★★★★☆</p>
                <p class="review-body">
                    娘の入門用に、格安と言うこともありお試しで購入しました。
                    本体のクオリティはまあ、入門用なのでそれなりに音が出ればいいやって感じですが、外装の段ボールがものすごい匂いを放っていました。
                    おそらく相当粗悪な接着剤を使っているのか、周りのものにも臭いが移って家中大騒ぎでした。
                    ダンボールでなく本体に由来するものであれば、皮膚がかぶれたりしないか心配です。
                <p> 
            </div> 
            <div class="review">
                <p class="reviewer-name">はると</p>
                <p class="review-evalution">★★★★☆</p>
                <p class="review-body">
                    娘の入門用に、格安と言うこともありお試しで購入しました。
                    本体のクオリティはまあ、入門用なのでそれなりに音が出ればいいやって感じですが、外装の段ボールがものすごい匂いを放っていました。
                    おそらく相当粗悪な接着剤を使っているのか、周りのものにも臭いが移って家中大騒ぎでした。
                    ダンボールでなく本体に由来するものであれば、皮膚がかぶれたりしないか心配です。
                <p> 
            </div> 
            <div class="review">
                <p class="reviewer-name">はると</p>
                <p class="review-evalution">★★★★☆</p>
                <p class="review-body">
                    娘の入門用に、格安と言うこともありお試しで購入しました。
                    本体のクオリティはまあ、入門用なのでそれなりに音が出ればいいやって感じですが、外装の段ボールがものすごい匂いを放っていました。
                    おそらく相当粗悪な接着剤を使っているのか、周りのものにも臭いが移って家中大騒ぎでした。
                    ダンボールでなく本体に由来するものであれば、皮膚がかぶれたりしないか心配です。
                <p> 
            </div> 
            <div class="review">
                <p class="reviewer-name">はると</p>
                <p class="review-evalution">★★★★☆</p>
                <p class="review-body">
                    娘の入門用に、格安と言うこともありお試しで購入しました。
                    本体のクオリティはまあ、入門用なのでそれなりに音が出ればいいやって感じですが、外装の段ボールがものすごい匂いを放っていました。
                    おそらく相当粗悪な接着剤を使っているのか、周りのものにも臭いが移って家中大騒ぎでした。
                    ダンボールでなく本体に由来するものであれば、皮膚がかぶれたりしないか心配です。
                <p> 
            </div> 
            <div class="review">
                <p class="reivewer-name">はると</p>
                <p class="review-evalution">★★★★☆</p>
                <p class="review-body">
                    娘の入門用に、格安と言うこともありお試しで購入しました。
                    本体のクオリティはまあ、入門用なのでそれなりに音が出ればいいやって感じですが、外装の段ボールがものすごい匂いを放っていました。
                    おそらく相当粗悪な接着剤を使っているのか、周りのものにも臭いが移って家中大騒ぎでした。
                    ダンボールでなく本体に由来するものであれば、皮膚がかぶれたりしないか心配です。
                <p> 
            </div> 
        </section>
    </article>
</body>
=======
<?php
session_start();
require_once 'common.php';

// データベースに接続
$pdo = connect_db();

// 選択された商品ID
$product_id = $_GET['product_id'];

// 商品詳細を取得
$stmt = $pdo->prepare('SELECT * FROM products A JOIN product_images B ON A.product_id = B.product_id AND image_id = 1 
    JOIN inventory C ON A.product_id = C.product_id WHERE A.product_id = ?');
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
    view_header();
    ?>

    <article class="details">
        <section class="row gap-3 product-area">
            <div class="col image-area">
                <div class="row">
                    <div class="col-2 sub-img-area">
                        <?php
                        $stmt = $pdo->prepare('SELECT image_url FROM product_images WHERE product_id = ?');
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
                <p class="name"><?= $_SESSION['detail']['product_name'] ?></p>
                <div class="row">
                    <p class="col brand"><?= $_SESSION['detail']['brand_name'] ?></p>
                    <p class="col evaluation">
                        <a class="favorite" href="process.php?action=favorite">
                            <?php
                                $stmt = $pdo->prepare('SELECT * FROM favorite WHERE user_id = ? AND product_id = ?');
                                $stmt->execute([$_SESSION['user']['user_id'], $_SESSION['detail']['product_id']]);

                                if ($stmt->fetch()) {
                                    echo '♥';
                                } else {
                                    echo '♡';
                                }
                            ?>
                        </a>
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
                    <form action="process.php" method="get">
                        数量：
                        <input  class="number" type="number" name="volume" value="1" min="1">
                        <input type="hidden" name="product_id" value="<?= $_SESSION['detail']['product_id'] ?>">
                        <button type="submit" class="btn cart" name="action" value="cart">カートに入れる</button>
                        <button class="btn buy">今すぐ買う</button>
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
            <form class="post-review-area" action="process.php" method="get">
                <p class="post-review-title">レビューを書く</p>
                <p class="post-evalution">
                    評価：
                    <select name="evaluation">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <textarea class="post-review-body" name="review_body" placeholder="レビュー内容"></textarea>
                <button class="btn post" type="submit" name="action" value="post">レビューを投稿</button>
            </form>

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
</body>

>>>>>>> 275cb915a084dd52813e4cefb8b093aa62edeba5:MusicHome/php/details_user.php
</html>