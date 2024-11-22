<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/Home.css">
</head>
    <!-- ヘッダー -->
    <div class="fixed">
        <header>
            <div class="header">
                <a href="./index.php" class="logo">MusicHome</a>
    
                <form method="get" action="search_result.php" class="search_container">
                    <input type="text" name="keyword" size="25" placeholder="　キーワード検索">
                    <input type="submit" name="keyword" value="&#xf002">
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
<body>
    <h4>ショッピングカート</h4>
    <div class="kart">
        <div class="contents">
            <img src="../image/sample.jpg" alt="サンプル">
            <p>メーカー</p>
            <p>説明</p>
            <p>在庫状況</p>
            <a href="#">削除</a>
        </div>
    </div>
</body>
</html>