// 在庫更新
document.querySelector('.plus').addEventListener('click', function () {
    const action = this.getAttribute('value'); // actionを取得
    const volume = document.getElementById('volume').value; // volumeを取得
    console.log(action);

    // サーバーに非同期リクエストを送信
    fetch('../php/js_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },

        body: JSON.stringify({
            action: action,
            volume: volume,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const inventory_volume = document.querySelector('.inventory-volume');
            inventory_volume.textContent = `在庫：${data.inventory_volume.toLocaleString()}`;
            showOverlayMessage('在庫を更新しました');
        } else {
            showOverlayMessage('在庫の更新に失敗しました');
        }
    })
    .catch(error => {
        console.error('エラー:', error);
        alert('通信エラーが発生しました。');
    });
});

document.querySelector('.minus').addEventListener('click', function () {
    const action = this.getAttribute('value'); // actionを取得
    const volume = document.getElementById('volume').value; // volumeを取得
    console.log(action);

    // サーバーに非同期リクエストを送信
    fetch('../php/js_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },

        body: JSON.stringify({
            action: action,
            volume: volume,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const inventory_volume = document.querySelector('.inventory-volume');
            inventory_volume.textContent = `在庫：${data.inventory_volume.toLocaleString()}`;
            showOverlayMessage('在庫を更新しました');
        } else {
            showOverlayMessage('在庫の更新に失敗しました');
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
    }, 1500); // 1.5秒後に非表示＆遷移
}