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

// ヘッダー表示
function view_header() {
    echo '<div class="fixed">
            <header>
                <div class="header">
                    <a href="top.php" class="logo">MusicHome</a>
        
                    <form method="get" action="search_result.php" class="search_container">
                        <input type="text" name="keyword" size="25" placeholder="　キーワード検索">
                        <input type="submit" value="検索">
                    </form>
        
                    <div class="header-site-menu">
                        <nav class="site-menu">
                            <a href="favorite.php">
                                <img src="../image/herat.jpeg" height="35">
                            </a>
                            <a href="cart.php">
                                <img src="../image/kart.png" height="55">
                            </a>
                            <a href="login.php">
                                <img src="../image/icon.png" height="45">
                            </a>
                        </nav>
                    </div>
                </div>

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
        </div>';
}

function view_header_manager() {
    echo '<div class="fixed">
            <header>
                <div class="header">
                    <a href="top_manager.php" class="logo">MusicHome</a>
        
                    <form method="get" action="search_result_manager.php" class="search_container">
                        <input type="text" name="keyword" size="25" placeholder="　キーワード検索">
                        <input type="submit" value="検索">
                    </form>
        
                    <div class="header-site-menu">
                        <nav class="site-menu">
                            <a href="register_product.php">
                                <img src="../image/kart.png" height="55">
                            </a>
                            <a href="login.php">
                                <img src="../image/icon.png" height="45">
                            </a>
                        </nav>
                    </div>
                </div>

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
        </div>';
}

// 商品一覧表示
function view_product_list($stmt) {
    // データベース接続
    $pdo = connect_db();

    // 商品画像取得
    echo '<div class="row">';
    while ($row = $stmt->fetch()) {
            echo '<button type="submit" name="product_id" value="'. $row['product_id']. '" class="card col-2">
                    <img  class="img" src="'. $row['image_url']. '" width="180">
                    <div class="detail-area">
                        <span>
                            <p class="brand">', $row['brand_name'], '</p>
                            <p class="evaluation">', avg_evaluation($row['product_id']), '</p>
                        </span>
                        <p class="name">'. $row['product_name']. '</p>
                        <p class="price">¥ '. number_format($row['price']). '</p>
                    </div>
                </button>';
    }
    echo '</div>';
}

// 評価計算
function avg_evaluation($product_id) {
    // データベース接続
    $pdo = connect_db();

    $stmt = $pdo->prepare('SELECT AVG(evaluation) AS avg_evaluation FROM review WHERE product_id = ? GROUP BY product_id');
    $stmt->execute([$product_id]);
    $avg_evaluation = round($stmt->fetchColumn());
    
    $evaluation = str_repeat('★', $avg_evaluation);
    $evaluation .= str_repeat('☆', 5 - $avg_evaluation);

    return $evaluation;
}
?>