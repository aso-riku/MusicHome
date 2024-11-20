<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register_product_style.css">
</head>

<body>
    <article class="register-product">
        <form action="#" method="post">
            <p class="title">商品登録</p>
            <div class="container outline">

                <div class="row name-area">
                    <div class="col-2">
                        <p class="headline">商品名</p>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        <input type="text" name="product_name" class="text-box">
                    </div>
                </div>

                <dvi class="row genre-area">
                    <div class="col-2">
                        <p class="headline">ジャンル</p>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        <select name="genre_id">
                            <option value="">アコースティックギター</option>
                            <option value="">エレクトリックギター</option>
                        </select>
                    </div>
                </dvi>

                <div class="row price-area">
                    <div class="col-2">
                        <p class="headline">金額</p>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        <input type="text" name="price" class="text-box">
                    </div>
                </div>

                <div class="row detail_area">
                    <div class="col-2">
                        <p class="headline">商品詳細</p>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        <textarea name="detail" class="text-area"></textarea>
                    </div>
                </div>

                <div class="row img-area">
                    <div class="col-2">
                        <p class="headline">商品画面</p>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-9">
                        <input type="file" name="file" class="file">
                    </div>
                </div>

                <div class="row inventory-area">
                    <div class="col-2">
                        <p class="headline">初期在庫数</p>
                    </div>
                    <div class="col-1">
                        
                    </div>
                    <div class="col-9">
                        <input type="text" name="inventory" class="text-box">
                    </div>
                </div>
            </div>
        </form>
    </article>
</body>

</html>