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
?>