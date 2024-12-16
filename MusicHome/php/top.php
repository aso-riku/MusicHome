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
    view_header();
    ?>

    <!-- スライド -->
    <!-- スライド -->
    <div class="slideshow-container">
        <div class="slide active">
            <img src="../image/blueno.jpg" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="../image/higtway.jpg" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="../image/blueno.jpg" alt="Slide 3">
        </div>

        <div class="controls">
            <button id="prev">&#10094;</button>
            <button id="next">&#10095;</button>
        </div>

        <div class="dots">
            <span data-index="0" class="active"></span>
            <span data-index="1"></span>
            <span data-index="2"></span>
        </div>
    </div>
</body>
<!-- ランキング -->
<main>
    <form action="details_user.php" method="get" class="ranking-area">
        <p class="ranking-title">RANKING</p>
        <p class="genre-title"><span>ギターランキング</span></p>
        <?php
        get_ranking('100');
        ?>

        <!-- ベースランキング -->
        <p class="genre-title"><span>ベースランキング</span></p>
        <?php
        get_ranking('200');
        ?>

        <!-- ドラムランキング -->
        <p class="genre-title"><span>ドラムランキング</span></p>
        <?php
        get_ranking('300');
        ?>

        <!-- ピアノランキング -->
        <p class="genre-title"><span>ピアノランキング</span></p>
        <?php
        get_ranking('400');
        ?>

        <!-- 周辺機器ランキング -->
        <p class="genre-title"><span>周辺機器ランキング</span></p>
        <?php
        get_ranking('500');
        ?>
    </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0xP7q3y5xwQ5sqjT9r5r5rkXg2qXYtEws0+zI+uyfaO6H5f2" crossorigin="anonymous"></script>
<script src="../js/slideshow.js"></script>

</html>