<?php
// サニタイジング
function sanitize($str)
{
    return htmlspecialchars($str);
}

// データベース接続
function connect_db()
{
    $dsn = 'mysql:host=mysql310.phy.lolipop.lan;
        dbname=LAA1595187-musichome;charset=utf8';
    $username = 'LAA1595187';
    $password = 'Pass0103';

    $pdo = new PDO($dsn, $username, $password);
    return $pdo;
}

// ヘッダー表示
function view_header()
{
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
                            <div class="menu-container">
                                <img src="../image/icon.png" height="45"> 
                                <div class="overlay-menu">
                                    <ul>';

                                        if (isset($_SESSION['user'])) {
                                            echo '<li><p>', $_SESSION['user']['user_name'], '</p></li>
                                                  <li><a href="profile.php" class="profile">アカウント情報</a></li>
                                                  <li><a href="buy_history" class="profile">購入履歴</a></li>
                                                  <li><a href="login.php?action=logout" class="text-logout">ログアウト</a></li>';
                                        } else {
                                            echo '<li>ログインしていません</li>
                                                  <li><a href="login.php?ログイン" class="text-login">ログイン</a></li>';
                                        }

    echo '                          </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="header-inner">
                <nav class="link">
                    <ul class="gnav_wrap">
                        <li class="main_menu">
                            <a href="search_result.php?action=menu&genre_id=100" class="sen">ギター</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="search_result.php?action=menu&genre_id=110" class="menu">エレキギター</a>
                                    <ul class="second_menu">
                                        <li><a href="search_result.php?action=menu&genre_id=111">テレキャスター</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=112">ストラトキャスター</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=113">レスポール</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=114">セミアコ</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=115">フルアコ</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=116">変形ギター</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=117">その他</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="search_result.php?action=menu&genre_id=120">アコースティックギター</a>
                                    <ul class="second_menu">
                                        <li><a href="search_result.php?action=menu&genre_id=121">クラシックギター</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=122">フォークギター</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=123">エレアコ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                         
                        <li class="main_menu">
                            <a href="search_result.php?action=menu&genre_id=200" class="sen">ベース</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="search_result.php?action=menu&genre_id=210" class="menu">エレキベース</a>
                                    <ul class="second_menu">
                                        <li><a href="search_result.php?action=menu&genre_id=211">ジャズベース</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=212">プレシジョンベース</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=213">5弦/6弦ベース</a></li>
                                        <li><a href="search_result.php?action=menu&genre_id=214">その他</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="search_result.php?action=menu&genre_id=220">アコースティックベース</a>
                                </li>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result.php?action=menu&genre_id=300" class="sen">ドラム</a>
                            <ul class="sub_menu">
                                <li><a href="search_result.php?action=menu&genre_id=310" class="menu">ドラムセット</a>
                                <li><a href="search_result.php?action=menu&genre_id=320" class="menu">タム</a>
                                <li><a href="search_result.php?action=menu&genre_id=330" class="menu">バスドラム</a>
                                <li><a href="search_result.php?action=menu&genre_id=340" class="menu">スネア</a>
                                <li><a href="search_result.php?action=menu&genre_id=350" class="menu">シンバル</a>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result.php?action=menu&genre_id=400" class="sen">ピアノ</a>
                            <ul class="sub_menu">
                                <li><a href="search_result.php?action=menu&genre_id=410" class="menu">電子ピアノ</a>
                                <li><a href="search_result.php?action=menu&genre_id=420" class="menu">キーボード</a>
                                <li><a href="search_result.php?action=menu&genre_id=430" class="menu">シンセサイザー</a>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result.php?action=menu&genre_id=500" class="sen">周辺機器</a>
                            <ul class="sub_menu">
                                <li><a href="search_result.php?action=menu&genre_id=510" class="menu">スピーカー</a>
                                <li><a href="search_result.php?action=menu&genre_id=520" class="menu">アンプ</a>
                                <li><a href="search_result.php?action=menu&genre_id=530" class="menu">ミキサー</a>
                                <li><a href="search_result.php?action=menu&genre_id=540" class="menu">プロセッサー</a>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            </header>
        </div>';
}

function view_header_manager()
{
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
                                <img src="../image/register.jpg" height="55">
                            </a>
                            <div class="menu-container"> 
                                <img src="../image/icon.png" height="45"> 
                                <div class="overlay-menu">
                                    <ul>';

                                        if (isset($_SESSION['manager'])) {
                                            echo '<li><p>', $_SESSION['manager']['manager_name'], '</p></li>
                                                  <li><a href="login.php?action=logout" class="text-logout">ログアウト</a></li>';
                                        } else {
                                            echo '<li>ログインしていません</li>
                                                  <li><a href="login.php?ログイン" class="text-login">ログイン</a></li>';
                                        }

    echo '                          </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="header-inner">
                <nav class="link">
                    <ul class="gnav_wrap">
                        <li class="main_menu">
                        <a href="search_result_manager.php?action=menu&genre_id=100" class="sen">ギター</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="search_result_manager.php?action=menu&genre_id=110" class="menu">エレキギター</a>
                                    <ul class="second_menu">
                                        <li><a href="search_result_manager.php?action=menu&genre_id=111">テレキャスター</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=112">ストラトキャスター</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=113">レスポール</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=114">セミアコ</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=115">フルアコ</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=116">変形ギター</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=117">その他</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="search_result_manager.php?action=menu&genre_id=120">アコースティックギター</a>
                                    <ul class="second_menu">
                                        <li><a href="search_result_manager.php?action=menu&genre_id=121">クラシックギター</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=122">フォークギター</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=123">エレアコ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result_manager.php?action=menu&genre_id=200" class="sen">ベース</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="search_result_manager.php?action=menu&genre_id=210" class="menu">エレキベース</a>
                                    <ul class="second_menu">
                                        <li><a href="search_result_manager.php?action=menu&genre_id=211">ジャズベース</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=212">プレシジョンベース</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=213">5弦/6弦ベース</a></li>
                                        <li><a href="search_result_manager.php?action=menu&genre_id=214">その他</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="search_result_manager.php?action=menu&genre_id=220">アコースティックベース</a>
                                </li>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result_manager.php?action=menu&genre_id=300" class="sen">ドラム</a>
                            <ul class="sub_menu">
                                <li><a href="search_result_manager.php?action=menu&genre_id=310" class="menu">ドラムセット</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=320" class="menu">タム</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=330" class="menu">バスドラム</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=340" class="menu">スネア</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=350" class="menu">シンバル</a>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result_manager.php?action=menu&genre_id=400" class="sen">ピアノ</a>
                            <ul class="sub_menu">
                                <li><a href="search_result_manager.php?action=menu&genre_id=410" class="menu">電子ピアノ</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=420" class="menu">キーボード</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=430" class="menu">シンセサイザー</a>
                            </ul>
                        </li>

                        <li class="main_menu">
                            <a href="search_result_manager.php?action=menu&genre_id=500" class="sen">周辺機器</a>
                            <ul class="sub_menu">
                                <li><a href="search_result_manager.php?action=menu&genre_id=510" class="menu">スピーカー</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=520" class="menu">アンプ</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=530" class="menu">ミキサー</a>
                                <li><a href="search_result_manager.php?action=menu&genre_id=540" class="menu">プロセッサー</a>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>';
}

// 商品一覧表示
function view_product_list($stmt)
{
    // データベース接続
    $pdo = connect_db();

    // 商品画像取得
    echo '<div class="ranking">';
    while ($row = $stmt->fetch()) {
        echo '<button type="submit" name="product_id" value="' . $row['product_id'] . '" class="product-card">
                    <img  class="product-img" src="' . $row['image_url'] . '" alt="画像がありません">
                    <div class="product-info">
                        <span>
                            <p class="brand">', $row['brand_name'], '</p>
                            <p class="evaluation">', avg_evaluation($row['product_id']), '</p>
                        </span>
                        <p class="product-name">' . $row['product_name'] . '</p>
                        <p class="product-price">¥ ' . number_format($row['price']) . '</p>
                    </div>
                </button>';
    }
    echo '</div>';
}

// 評価計算
function avg_evaluation($product_id)
{
    // データベース接続
    $pdo = connect_db();

    $stmt = $pdo->prepare('SELECT AVG(evaluation) AS avg_evaluation FROM review WHERE product_id = ? GROUP BY product_id');
    $stmt->execute([$product_id]);
    $avg_evaluation = round($stmt->fetchColumn());

    $evaluation = str_repeat('★', $avg_evaluation);
    $evaluation .= str_repeat('☆', 5 - $avg_evaluation);

    return $evaluation;
}

// ジャンルの階層構造
function buildGenreOptions($genres, $parentId = null, $depth = 0)
{
    $html = '';
    foreach ($genres as $genre) {
        if ($genre['higher_genre_id'] == $parentId) {
            // インデントを加えて階層を表現
            $indent = str_repeat('&nbsp;&nbsp;', $depth);
            $html .= '<option value="' . $genre['genre_id'] . '">' . $indent . $genre['genre_name'] . '</option>';
            // 子要素を再帰的に追加
            $html .= buildGenreOptions($genres, $genre['genre_id'], $depth + 1);
        }
    }
    return $html;
}

function get_ranking($genre_id)
{
    $pdo = connect_db();

    $sql = 'WITH RECURSIVE genre_tree AS ( SELECT genre_id FROM genre WHERE genre_id = ? 
        UNION ALL SELECT g.genre_id FROM genre g INNER JOIN genre_tree gt ON g.higher_genre_id = gt.genre_id ) 
        SELECT p.product_id, p.product_name, p.price, pi.image_url, SUM(p.price * volume) AS total_sales FROM products p 
        INNER JOIN genre_tree gt ON p.genre_id = gt.genre_id INNER JOIN sales_receipt sr ON p.product_id = sr.product_id 
        LEFT OUTER JOIN product_images pi ON p.product_id = pi.product_id AND pi.image_id = 1 GROUP BY p.product_id, p.product_name 
        ORDER BY total_sales DESC LIMIT 5';


    $stmt = $pdo->prepare($sql);
    $stmt->execute([$genre_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="ranking">';
    foreach ($results as $row) {
        echo '<button type="submit" name="product_id" value="' . $row['product_id'] . '" class="product-card">
            <div class="rank-badge">
                <?= array_search($row, $results) + 1; ?> <!-- ランキング番号 -->
            </div>
            <img class="product-img" src="', $row['image_url'], '">
            <div class="product-info">
                <p class="product-name">', $row['product_name'], '</p>
                <p class="product-price">¥', number_format($row['price']), '</p>
            </div>
        </button>';
    }
    echo '</div>';
}
