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
</head>

<body>
    <?php
    require_once 'common.php';

    // ヘッダー表示
    view_header_manager();
    ?>

    <!-- スライド -->
    <article class="top">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://gibson.jp/wp/wp-content/uploads/2019/07/Acoustic_Landing_Header_G45.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://birdlandguitars.com/files/tears2/d/header.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://birdlandguitars.com/files/tears2/d/header.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </article>
</body>
<!-- ランキング -->
<main>
    <form action="details_manager.php" method="get" class="ranking-area">
        <p class="ranking-title">RANKING</p>
        <p class="genre-title"><span>ギターランキング</span></p>
        <?php
        get_ranking('100');
        ?>

        <!-- ベースランキング -->
        <p class="genre-title"><span>ベースランキング</span></p>
        <?php
        get_ranking('100');
        ?>

        <!-- ドラムランキング -->
        <p class="genre-title"><span>ドラムランキング</span></p>
        <?php
        get_ranking('100');
        ?>

        <!-- ピアノランキング -->
        <p class="genre-title"><span>ピアノランキング</span></p>
        <?php
        get_ranking('100');
        ?>

        <!-- 和楽器ランキング -->
        <p class="genre-title"><span>和楽器ランキング</span></p>
        <?php
        get_ranking('100');
        ?>

        <!-- 周辺機器ランキング -->
        <p class="genre-title"><span>周辺機器ランキング</span></p>
        <?php
        get_ranking('100');
        ?>
    </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0xP7q3y5xwQ5sqjT9r5r5rkXg2qXYtEws0+zI+uyfaO6H5f2" crossorigin="anonymous"></script>

</html>