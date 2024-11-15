<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/header_style.css">
    <link rel="stylesheet" href="../css/products_list.css">
</head>
<body>

    <article class="search_result">
        <form action="details.php" method="post">
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo '<div class="row gap-2">';
                    for ($j = 0; $j < 6; $j++) {
                        echo '<button type="submit" class="card col">
                                <img  class="img" src="../image/guitar_sample.jpg" width="180">
                                <p>MICK THOMSON SOLOIST SL2 ARCTIC WHITE</p>
                                <p>¥ 250,000</p>
                              </button>';
                    }
                echo '</div>';
            }
            ?>
        </form>
    </article>
</body>
</html>