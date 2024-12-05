// カートから削除
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', event => {
        // 商品IDを取得
        const productId = event.target.getAttribute('data-product-id');

        // サーバーに削除リクエストを送信
        fetch('../php/js_request.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'delete', product_id: productId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // 商品をDOMから削除
                    const productRow = document.getElementById(`product-${productId}`);
                    if (productRow) {
                        productRow.remove();
                    }

                    const productHr = document.getElementById(`hr-${productId}`);
                    if (productHr) {
                        productHr.remove();
                    }

                    showOverlayMessage('カートから削除しました');

                    // 合計金額を更新
                    const totalPriceElement = document.querySelector('.total-price');
                    totalPriceElement.textContent = `¥ ${data.total_price.toLocaleString()}`;

                    // 個数を更新
                    const totalItemsElement = document.querySelector('.total-item');
                    totalItemsElement.textContent = `合計 (${data.total_items} 個の商品)`;
                } else {
                    showOverlayMessage('カートから削除しました');
                    console.error('削除に失敗しました:', data.message);
                }
            })
            .catch(error => {
                console.error('エラーが発生しました:', error);
            });
    });
});

// カートの数量変更
document.querySelectorAll('.volume-input').forEach(input => {
    input.addEventListener('change', (event) => {
        const productId = event.target.getAttribute('data-product-id');
        const newVolume = event.target.value;

        // AJAXリクエスト送信
        fetch('../php/js_request.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'update', product_id: productId, volume: newVolume })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // 合計金額を更新
                    const totalPriceElement = document.querySelector('.total-price');
                    totalPriceElement.textContent = `¥ ${data.total_price.toLocaleString()}`;

                    // 個数を更新
                    const totalItemsElement = document.querySelector('.total-item');
                    totalItemsElement.textContent = `合計 (${data.total_items} 個の商品)`;
                } else {
                    console.error('更新に失敗しました:', data.message);
                }
            })
            .catch(error => {
                console.error('エラー:', error);
            });
    });
});

// カートに追加
document.querySelector('.cart-btn').addEventListener('click', function () {
    const productId = this.getAttribute('data-product-id'); // 商品IDを取得
    const volume = document.getElementById('volume').value; // 数量を取得

    // バリデーション: 数量が正の整数であるか
    if (volume <= 0) {
        alert('数量は1以上を指定してください。');
        return;
    }

    // サーバーに非同期リクエストを送信
    fetch('../php/js_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'cart',
            product_id: productId,
            volume: volume,
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showOverlayMessage('カートに追加しました');
            } else {
                showOverlayMessage('カートに追加できませんでした');
            }
        })
        .catch(error => {
            console.error('エラー:', error);
            alert('通信エラーが発生しました。');
        });
});

// お気に入り登録
document.querySelector('.favorite').addEventListener('click', function (e) {
    e.preventDefault();

    const productId = this.getAttribute('data-product-id'); // 商品IDを取得
    const isFavorite = this.textContent != '♡'; // 現在のお気に入り状態を判定
    console.log(isFavorite);

    // サーバーにリクエストを送信
    fetch('../php/js_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            product_id: productId,
            action: 'favorite',
            flg: isFavorite ? 'remove' : 'add',
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // UIの更新: ハートマークの切り替え
                this.textContent = isFavorite ? '♡' : '♥';
            } else {
                alert('操作に失敗しました: ' + data.message);
            }
        })
        .catch(error => {
            console.error('エラー:', error);
            alert('通信エラーが発生しました。');
        });
});

// オーバーレイを表示する関数
function showOverlayMessage(message) {
    const overlay = document.getElementById('overlay-message');
    const overlayText = document.getElementById('overlay-text');
    
    overlayText.textContent = message; // メッセージを設定
    overlay.classList.remove('hidden'); // 表示

    // 一定時間後に非表示にする
    setTimeout(() => {
        overlay.classList.add('hidden');
    }, 1500); // 3秒後に非表示
}

// サブ画像追加ボタンのイベントリスナー
document.querySelector('.add').addEventListener('click', function () {
    // サブ画像エリア (sub-img-area) の親要素を取得
    const subImgArea = document.querySelector('.sub-img-area');

    // 新しい行を作成
    const newRow = document.createElement('div');
    newRow.classList.add('row', 'sub-img-area'); // 同じクラスを付与

    // 新しい列を作成
    newRow.innerHTML = `
        <div class="col-2">
        </div>
        <div class="col-1"></div>
        <div class="col-9">
            <input type="input" name="sub_image[]" class="text-box">
        </div>
    `;

    // サブ画像エリアの親要素に新しい行を追加
    subImgArea.parentNode.appendChild(newRow);
});


