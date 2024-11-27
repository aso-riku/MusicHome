<<<<<<< HEAD:php/top.php
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
    <!-- ヘッダー -->
    <div class="fixed">
        <header>
            <div class="header">
                <a href="./index.php" class="logo">MusicHome</a>
    
                <form method="get" action="search_result.php" class="search_container">
                    <input type="text" size="25" placeholder="　キーワード検索">
                    <input type="submit" value="&#xf002">
                </form>
    
                    <div class="header-site-menu">
                        <nav class="site-menu">
                            <a href="favorite.php">
                                <img src="../img/herat.jpeg" height="35">
                            </a>
                            <a href="kart.php">
                                <img src="../img/kart.png" height="55">
                            </a>
                            <a href="icon.php">
                                <img src="../img/icon.png" height="45">
                            </a>
                        </nav>
                    </div>
    
            </div>
            <!-- ナビゲーション -->
            <div class="header-inner">
                <nav class="link">
                    <ul class="gnav_wrap">
                        <li class="main_menu">
                            <span class="sen">ギター</span>
                            <ul class="sub_menu">
                                <li><a href="#">エレキギター</a></li>
                                <li><a href="#">アコースティックギター</a></li>
                                <li><a href="#">クラシックギター</a></li>
                                <li><a href="#">その他</a></li>
                            </ul>
                        </li>
                        <li class="main_menu">
                            <span class="sen">ベース</span>
                            <ul class="sub_menu">
                                <li><a href="#">JBタイプ</a></li>
                                <li><a href="#">PBタイプ</a></li>
                                <li><a href="#">PJタイプ</a></li>
                                <li><a href="#">多弦ベース</a></li>
                            </ul>
                        </li>
                        <li class="main_menu">
                            <span class="sen">ドラム</span>
                            <ul class="sub_menu">
                                <li><a href="#">ドラム</a></li>
                                <li><a href="#">スネア</a></li>
                                <li><a href="#">電子ドラム</a></li>
                                <li><a href="#">シンバル</a></li>
                            </ul>
                        </li>
                        <li class="main_menu">
                            <span class="sen">ピアノ</span>
                            <ul class="sub_menu">
                                <li><a href="#">コンセプト1</a></li>
                                <li><a href="#">コンセプト2</a></li>
                                <li><a href="#">コンセプト3</a></li>
                                <li><a href="#">コンセプト4</a></li>
                            </ul>
                        </li>
                        <li class="main_menu">
                            <span class="sen">和楽器</span>
                            <ul class="sub_menu">
                                <li><a href="#">コンセプト1</a></li>
                                <li><a href="#">コンセプト2</a></li>
                                <li><a href="#">コンセプト3</a></li>
                                <li><a href="#">コンセプト4</a></li>
                            </ul>
                        </li>
                        <li class="main_menu">
                            <span class="sen">周辺機器</span>
                            <ul class="sub_menu">
                                <li><a href="#">コンセプト1</a></li>
                                <li><a href="#">コンセプト2</a></li>
                                <li><a href="#">コンセプト3</a></li>
                                <li><a href="#">コンセプト4</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
    <?php
    require_once 'common.php';

    // ヘッダー表示
    view_header();
    ?>

    <!-- スライド -->
    <div class="yohaku">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="../image/elect.YAMAHA.avif" class="d-block" alt="../image/elect.YAMAHA.avif">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="../image/elect.YAMAHA.avif" class="d-block" alt="../image/elect.YAMAHA.avif">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../image/elect.YAMAHA.avif" class="d-block" alt="../image/elect.YAMAHA.avif">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </div>
</body>
<!-- ランキング -->
<main>
    <section class="ranking">
        <!-- ギターランキング -->
        <h2>ギターランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px" alt="これはサンプルです">
                <h6>aaaaaaaaaaaaa<h6>
                <p>aaaaaaaaaaaaaaaaaaa</p>
                <h5>139,000</h5>
                
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
    <div class="yohaku">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="../image/elect.YAMAHA.avif" class="d-block" alt="../image/elect.YAMAHA.avif">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="../image/elect.YAMAHA.avif" class="d-block" alt="../image/elect.YAMAHA.avif">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../image/elect.YAMAHA.avif" class="d-block" alt="../image/elect.YAMAHA.avif">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </div>
</body>
<!-- ランキング -->
<main>
    <section class="ranking">
        <!-- ギターランキング -->
        <h2>ギターランキング</h2>
        <div class="flex">
            <div class="rank1">
                <img src="../image/sample.jpg" height="100px">
                <h6>aaaaaaaaaaaaa<h6>
                <p>aaaaaaaaaaaaaaaaaaa</p>
                <h5>139,000</h5>
                
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