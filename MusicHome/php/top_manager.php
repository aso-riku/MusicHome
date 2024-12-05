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
                    <img src="https://birdlandguitars.com/files/tears2/d/header.jpg" class="d-block w-100" alt="...">
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
    <section class="ranking">
        <div class="section" id="r_ranking">
            <img src="/images/original_design_default/samplesource/3/ranking_title.gif" alt="ランキング" class="titleMgn">
            <ul class="clear">
                <!-- ←ランキング1位～5位を表示 -->
                <li class="rankList" id="rank[RANK_NO]">
                    <em>[RANK_NO]</em>
                    <div class="rankImg"><a href=[RANK_ITEMDETAIL]>[RANK_IMG_M]</a></div>
                    <div class="rankDetail">
                        <p class="rankName"><a href=[RANK_ITEMDETAIL]>[RANK_BRANDNAME]</a></p>
                        <p class="rankPrice">[RANK_PRICE]</p>
                    </div>
                </li>

            </ul>
        </div>


        <!-- ベースランキング -->
        <h2>ベースランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" width="100px">
                <p>aaaaaaaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
        </div>

        <!-- ドラムランキング -->
        <h2>ドラムランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" width="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
        </div>

        <!-- ピアノランキング -->
        <h2>ピアノランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" width="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
        </div>

        <!-- 和楽器ランキング -->
        <h2>和楽器ランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" width="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
        </div>

        <!-- 周辺機器ランキング -->
        <h2>周辺機器ランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" width="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <p>aaaaaaaaaaaaa</p>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0xP7q3y5xwQ5sqjT9r5r5rkXg2qXYtEws0+zI+uyfaO6H5f2" crossorigin="anonymous"></script>

</html>