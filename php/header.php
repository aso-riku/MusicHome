<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/header_style.css">
</head>

<body>
    <header>
        <div class="header-inner">
            <a href="top.php" class="logo">MusicHome</a>
            <form action="search.php" method="post">
                <input type="text" name="keyword" class="form-control search">
            </form>
            <div class="header-site-menu">
                <nav class="site-menu">
                    <a href="favorite.php">
                        <image src="../image/heart.png" height="35"></image>
                    </a>
                    <a href="cart.php">
                        <image src="../image/cart.png" height="45"></image>
                    </a>
                    <a href="icon.php">
                        <image src="../image/icon.png" height="45"></image>
                    </a>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>