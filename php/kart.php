<?php
session_start();
require_once 'common.php';
view_header();
?>

<?php
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1600428-musichome;charset=utf8',
    'LAA1600428',
    'MusicHome');

    $stmt = $pdo->prepare('SELECT * FROM cart WHERE user_id = ?');
    $stmt->execute([$_SESSION['user']['user_id']]);

    if(isset($_SESSION['cart'])){
        $_SESSION['cart'];
    }

    function addToCart($id,$name,$price,$quanitity){
        $item = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quanitity,
        ];

        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] += $quanitity; 
        } else 
        $_SESSION['cart'][$id] = $item;

    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/Home.css">
    <title>Document</title>
</head>
        <body>
        <h1>ショッピングカート</h1>
            <?php if(empty($cart)):?>
                <p>カートに商品がありません。</p>
            <?php else: ?>
                <?php foreach ($cart as $item): ?>
                    <div class="cart-item">
                        <p>商品名： <?=htmlspecialchars($item['name'])?></p>
                        <p>単価： ￥<?=number_format($item['price'])?></p>
                        <p>数量： <?=$item['quantity']?></p>
                        <p>小計： ￥<?=number_format($item['price'] * $item['quantity'])?></p>
                        <a href="remove.php?id=<?= $item['id']?>" class="btn">削除</a>
                    </div>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                    <div class="cart-summy">
                        <p>合計金額： ￥<?= number_format($total)?></p>
                        <a href="checkout.php" class="bnt">購入手続きへ進む</a>
                    </div>
                    <?php endif; ?>
        </body>
</html>

