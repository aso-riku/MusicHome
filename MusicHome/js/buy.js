// 購入確定
document.querySelector('.buy-btn').addEventListener('click', function () {
    const action = this.getAttribute('value'); // actionを取得
    const productId = this.getAttribute('data-product-id'); // 商品IDを取得
    const volume = document.getElementById('volume').value; // volumeを取得

    // サーバーに非同期リクエストを送信
    fetch('../php/js_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: action,
            product_id: productId,
            volume: volume,
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            showOverlayMessage('購入を確定しました');
        } else {
            showOverlayMessage('購入を確定できませんでした');
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
        overlay.classList.add('hidden'); // オーバーレイを非表示にする
        window.location.href = 'top.php'; // top.phpに遷移
    }, 1500); // 1.5秒後に非表示＆遷移
}