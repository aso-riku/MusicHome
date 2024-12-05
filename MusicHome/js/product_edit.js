document.querySelector('.update').addEventListener('click', async function (event) {
    event.preventDefault(); // 通常の動作を防ぐ

    // 入力データを収集
    const formData = {
        action: 'product_update',
        product_name: document.querySelector('input[name="product_name"]').value,
        brand: document.querySelector('input[name="brand"]').value,
        genre_id: document.querySelector('select[name="genre_id"]').value,
        price: document.querySelector('input[name="price"]').value,
        detail: document.querySelector('textarea[name="detail"]').value,
        main_image: document.querySelector('input[name="main_image"]').value,
        sub_image: Array.from(document.querySelectorAll('input[name="sub_image[]"]')).map(input => input.value),
        inventory: document.querySelector('input[name="inventory"]').value,
        LT: document.querySelector('input[name="LT"]').value,
    };

    console.log(formData);

    try {
        // 非同期でデータを送信
        const response = await fetch('js_request.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        });

        const result = await response.json();

        if (result.success) {
            showOverlayMessage('商品情報を更新しました');
        } else {
            showOverlayMessage('商品情報の更新に失敗しました');
        }
    } catch (error) {
        console.error('通信エラー:', error);
        alert('通信エラーが発生しました。');
    }
});

document.querySelector('.delete').addEventListener('click', async function (event) {
    event.preventDefault(); // 通常の動作を防ぐ

    // 入力データを収集
    const formData = {
        action: 'product_delete',
    }

    console.log(formData);

    try {
        // 非同期でデータを送信
        const response = await fetch('js_request.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        });

        const result = await response.json();

        if (result.success) {
            showOverlayMessage('商品を削除しました');
        } else {
            showOverlayMessage('商品の削除に失敗しました');
        }
    } catch (error) {
        console.error('通信エラー:', error);
        alert('通信エラーが発生しました。');
    }
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