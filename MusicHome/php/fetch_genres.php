<?php
require_once 'common.php'; // DB接続ファイル

if (isset($_POST['higher_genre_id'])) {
    $higher_genre_id = $_POST['higher_genre_id'];

    $pdo = connect_db(); // DB接続関数
    $stmt = $pdo->prepare('SELECT genre_id, genre_name FROM genre WHERE higher_genre_id = :higher_genre_id');
    $stmt->bindValue(':higher_genre_id', $higher_genre_id, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}
?>
