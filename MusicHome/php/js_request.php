<?php
session_start();
require_once 'common.php';

// データベース接続
$pdo = connect_db();

// JSONリクエストを取得
$data = json_decode(file_get_contents('php://input'), true);

// カート数量変更
if ($data['action'] == 'update') {
    if (!isset($data['product_id']) || !isset($data['volume'])) {
        echo json_encode(['success' => false, 'message' => '不正なリクエスト']);
        exit;
    }

    // データの検証
    $product_id = sanitize($data['product_id']);
    $volume = (int)$data['volume'];
    if ($volume <= 0) {
        echo json_encode(['success' => false, 'message' => '数量は1以上である必要があります']);
        exit;
    }

    // データベース更新
    $pdo = connect_db();
    $stmt = $pdo->prepare('UPDATE cart SET volume = ? WHERE user_id = ? AND product_id = ?');
    $success = $stmt->execute([$volume, $_SESSION['user']['user_id'], $product_id]);

    if ($success) {
        // 合計金額と商品数を取得
        $stmt = $pdo->prepare('SELECT SUM(volume) FROM cart WHERE user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $total_items = $stmt->fetchColumn();

        $stmt = $pdo->prepare('SELECT SUM(B.price * A.volume) AS total_price
                           FROM cart A JOIN products B ON A.product_id = B.product_id
                           WHERE A.user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $total_price = $stmt->fetchColumn();

        echo json_encode([
            'success' => true,
            'total_price' => number_format($total_price),
            'total_items' => $total_items,
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => '更新に失敗しました。']);
    }

    // カート削除
} else if ($data['action'] == 'delete') {
    // 必要なパラメータの検証
    if (!isset($data['product_id']) || !isset($_SESSION['user']['user_id'])) {
        echo json_encode(['success' => false, 'message' => '無効なリクエストです。']);
        exit;
    }

    $product_id = $data['product_id'];
    $user_id = $_SESSION['user']['user_id'];

    // データベース接続
    $pdo = connect_db();

    $stmt = $pdo->prepare('DELETE FROM cart WHERE product_id = ? AND user_id = ?');
    $result = $stmt->execute([$product_id, $user_id]);

    // 合計金額と商品数を取得
    $stmt = $pdo->prepare('SELECT SUM(volume) FROM cart WHERE user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);
    $total_items = $stmt->fetchColumn();

    $stmt = $pdo->prepare('SELECT SUM(B.price * A.volume) AS total_price
                       FROM cart A JOIN products B ON A.product_id = B.product_id
                       WHERE A.user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);
    $total_price = $stmt->fetchColumn();

    if ($result) {
        echo json_encode([
            'success' => true,
            'total_price' => number_format($total_price),
            'total_items' => $total_items,
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => '削除に失敗しました。']);
    }

    // カートに追加
} else if ($data['action'] == 'cart') {
    $product_id = $data['product_id'];
    $volume = $data['volume'];

    // 現在のカートに商品が既に存在するかを確認
    $stmt = $pdo->prepare('SELECT * FROM cart WHERE user_id = ? AND product_id = ?');
    $stmt->execute([$_SESSION['user']['user_id'], $product_id]);
    $current_cart = $stmt->fetch();

    if ($current_cart) {
        // カートに既に存在する場合、数量を更新
        $new_volume = $current_cart['volume'] + $volume;
        $stmt = $pdo->prepare('UPDATE cart SET volume = ? WHERE user_id = ? AND product_id = ?');
        $stmt->execute([$new_volume, $_SESSION['user']['user_id'], $product_id]);
    } else {
        $stmt = $pdo->prepare('SELECT MAX(cart_number) FROM cart WHERE user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $cart_number = $stmt->fetchColumn() + 1;
        // カートに存在しない場合、新しいエントリを挿入
        $stmt = $pdo->prepare('INSERT INTO cart VALUES (?, ?, ?, ?)');
        $stmt->execute([$_SESSION['user']['user_id'], $cart_number, $product_id, $volume]);
    }

    // 処理成功のレスポンスを返す
    echo json_encode(['success' => true]);

    // お気に入り
} else if ($data['action'] == 'favorite') {
    $product_id = $data['product_id'];
    $flg = $data['flg'];

    // 必要なチェック
    if (!$product_id || !in_array($flg, ['add', 'remove'])) {
        echo json_encode(['success' => false, 'message' => '無効なリクエストです。']);
        exit;
    }

    try {
        if ($flg == 'add') {
            // お気に入り登録
            $stmt = $pdo->prepare('INSERT INTO favorite VALUES (?, ?)');
            $stmt->execute([$_SESSION['user']['user_id'], $product_id]);
        } else {
            // お気に入り削除
            $stmt = $pdo->prepare('DELETE FROM favorite WHERE user_id = ? AND product_id = ?');
            $stmt->execute([$_SESSION['user']['user_id'], $product_id]);
        }
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    // カートから購入
} else if ($data['action'] == 'buy-cart') {
    try {
        // sales テーブルに追加
        $stmt = $pdo->prepare('INSERT INTO sales (user_id, sales_date) VALUES(?, NOW())');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $sales_number = $pdo->lastInsertId();

        // sales_receipt テーブルに追加
        $stmt = $pdo->prepare('SELECT * FROM cart WHERE user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $receipt_number = 0;

        while ($row = $stmt->fetch()) {
            $receipt_number += 1;
            $stmt2 = $pdo->prepare('INSERT INTO sales_receipt VALUES(?,?,?,?)');
            $stmt2->execute([$sales_number, $receipt_number, $row['product_id'], $row['volume']]);

            // inventory テーブルから数量を減らす
            $stmt3 = $pdo->prepare('UPDATE inventory SET inventory_volume = inventory_volume - ? WHERE product_id = ?');
            $stmt3->execute([$row['volume'], $row['product_id']]);
        }

        // cart テーブルから削除
        $stmt = $pdo->prepare('DELETE FROM cart WHERE user_id = ?');
        $stmt->execute([$_SESSION['user']['user_id']]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    // 今すぐ買う
} else if ($data['action'] == 'buy-now') {
    $product_id = $data['product_id'];
    $volume = $data['volume'];

    try {
        // sales テーブルに追加
        $stmt = $pdo->prepare('INSERT INTO sales (user_id, sales_date) VALUES(?, NOW())');
        $stmt->execute([$_SESSION['user']['user_id']]);
        $sales_number = $pdo->lastInsertId();

        // sales_receipt テーブルに追加
        $stmt2 = $pdo->prepare('INSERT INTO sales_receipt VALUES(?,1,?,?)');
        $stmt2->execute([$sales_number, $product_id, $volume]);

        // inventory テーブルから数量を減らす
        $stmt3 = $pdo->prepare('UPDATE inventory SET inventory_volume = inventory_volume - ? WHERE product_id = ?');
        $stmt3->execute([$volume, $product_id]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    // 在庫を増やす
} else if ($data['action'] == 'plus') {
    $volume = $data['volume'];

    $stmt = $pdo->prepare('UPDATE inventory SET inventory_volume = inventory_volume + ? WHERE product_id = ?');
    $stmt->execute([$volume, $_SESSION['detail']['product_id']]);
    $stmt = $pdo->prepare('SELECT inventory_volume FROM inventory WHERE product_id = ?');
    $stmt->execute([$_SESSION['detail']['product_id']]);
    $inventory_volume = $stmt->fetchColumn();

    echo json_encode(['success' => true, 'inventory_volume' => number_format($inventory_volume)]);

    // 在庫を減らす
} else if ($data['action'] == 'minus') {
    $volume = $data['volume'];

    $stmt = $pdo->prepare('UPDATE inventory SET inventory_volume = inventory_volume - ? WHERE product_id = ?');
    $stmt->execute([$volume, $_SESSION['detail']['product_id']]);
    $stmt = $pdo->prepare('SELECT inventory_volume FROM inventory WHERE product_id = ?');
    $stmt->execute([$_SESSION['detail']['product_id']]);
    $inventory_volume = $stmt->fetchColumn();

    echo json_encode(['success' => true, 'inventory_volume' => $inventory_volume]);

    // 商品登録
} else if ($data['action'] == 'register') {
    try {
        $pdo->query('ALTER TABLE products AUTO_INCREMENT = 1');
        // データを挿入
        $stmt = $pdo->prepare('INSERT INTO products (product_name, product_detail, price, lead_time, genre_id, brand_name) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            $data['product_name'],
            $data['detail'],
            $data['price'],
            $data['LT'],
            $data['genre_id'],
            $data['brand'],
        ]);

        $product_id = $pdo->lastInsertId();

        $stmt = $pdo->prepare('INSERT INTO product_images VALUES (?,?,?)');
        $stmt->execute([$product_id, 1, $data['main_image']]);

        // サブ画像を挿入
        $image_id = 1;
        if (!empty($data['sub_image'])) {
            $stmt = $pdo->prepare('INSERT INTO product_images VALUES (?, ?, ?)');
            foreach ($data['sub_image'] as $subImage) {
                if (!empty($subImage)) {
                    $image_id += 1;
                    $stmt->execute([$product_id, $image_id, $subImage]);
                }
            }
        }

        // inventory テーブルに追加
        $stmt = $pdo->prepare('INSERT INTO inventory VALUES(?,?)');
        $stmt->execute([$product_id, $data['inventory']]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    // 商品更新
} else if ($data['action'] == 'product_update') {
    try {
        $genre_id = '';
        if ($data['genre_id'] == null) {
            $genre_id = $data['old_genre_id'];
        } else {
            $genre_id = $data['genre_id'];
        }

        $stmt = $pdo->prepare('UPDATE products SET product_name = ?, product_detail = ?, price = ?, lead_time = ?, genre_id = ?, brand_name = ? WHERE product_id = ?');
        $stmt->execute([
            $data['product_name'],
            $data['detail'],
            $data['price'],
            $data['LT'],
            $genre_id,
            $data['brand'],
            $_SESSION['detail']['product_id']
        ]);

        $stmt = $pdo->prepare('UPDATE product_images SET image_url = ? WHERE product_id = ? AND image_id = 1');
        $stmt->execute([$data['main_image'], $_SESSION['detail']['product_id']]);

        $stmt = $pdo->prepare('SELECT MAX(image_id) AS MAX_image_id FROM product_images WHERE product_id = ?');
        $stmt->execute([$_SESSION['detail']['product_id']]);
        $max_image_id = $stmt->fetchColumn();

        $image_id = 1;
        if (!empty($data['sub_image'])) {
            $stmt = $pdo->prepare('UPDATE product_images SET image_url = ? WHERE product_id = ? AND image_id = ?');
            foreach ($data['sub_image'] as $subImage) {
                if (!empty($subImage)) {
                    $image_id += 1;
                    if ($image_id > $max_image_id) {
                        $stmt1 = $pdo->prepare('INSERT INTO product_images VALUES(?,?,?)');
                        $stmt1->execute([$_SESSION['detail']['product_id'], $image_id, $subImage]);
                    } else {
                        $stmt->execute([$subImage, $_SESSION['detail']['product_id'], $image_id]);
                    }
                }
            }
        }

        $stmt = $pdo->prepare('DELETE FROM product_images WHERE product_id = ? AND image_id > ?');
        $stmt->execute([$_SESSION['detail']['product_id'], $image_id]);

        $stmt = $pdo->prepare('UPDATE inventory SET inventory_volume = ? WHERE product_id = ?');
        $stmt->execute([$data['inventory'], $_SESSION['detail']['product_id']]);

        $stmt = $pdo->prepare('SELECT genre_name, A.genre_id FROM products A JOIN genre B ON A.genre_id = B.genre_id WHERE product_id = ?');
        $stmt->execute([$_SESSION['detail']['product_id']]);
        $row = $stmt->fetch();

        echo json_encode(['success' => true, 'old_genre_id' => $row['genre_id'], 'old_genre_name'=> $row['genre_name']]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    // 商品削除
} else if ($data['action'] == 'product_delete') {
    try {
        // product_iamges テーブルから削除
        $stmt = $pdo->prepare('DELETE FROM product_images WHERE product_id = ?');
        $stmt->execute([$_SESSION['detail']['product_id']]);

        // inventory テーブルから削除
        $stmt = $pdo->prepare('DELETE FROM inventory WHERE product_id = ?');
        $stmt->execute([$_SESSION['detail']['product_id']]);

        // products テーブルから削除
        $stmt = $pdo->prepare('DELETE FROM products WHERE product_id = ?');
        $stmt->execute([$_SESSION['detail']['product_id']]);

        // cart テーブルから削除
        $stmt = $pdo->prepare('DELETE FROM cart WHERE product_id = ?');
        $stmt->execute([$_SESSION['detail']['product_id']]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
