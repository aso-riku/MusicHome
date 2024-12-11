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
            <p class="headline">　</p>
        </div>
        <div class="col-1"></div>
        <div class="col-9">
            <input type="input" name="sub_image[]" class="text-box">
        </div>
    `;

    // サブ画像エリアの親要素に新しい行を追加
    subImgArea.parentNode.appendChild(newRow);
});

document.querySelector('.register').addEventListener('click', async function (event) {
    event.preventDefault(); // 通常の動作を防ぐ

    // 最下層のジャンルを取得
    const genreSelects = Array.from(document.querySelectorAll('.genre-select'));
    const selectedGenreIds = genreSelects
        .map(select => select.value)
        .filter(value => value !== ''); // 未選択の値を除外

    const lastGenreId = selectedGenreIds[selectedGenreIds.length - 1] || null;

    // 入力データを収集
    const formData = {
        action: 'register',
        product_name: document.querySelector('input[name="product_name"]').value,
        brand: document.querySelector('input[name="brand"]').value,
        genre_id: lastGenreId,
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
            showOverlayMessage('商品を登録しました');
        } else {
            showOverlayMessage('商品の登録に失敗しました');
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

document.addEventListener('DOMContentLoaded', function () {
    const genreArea = document.querySelector('.genre-area');

    genreArea.addEventListener('change', function (event) {
        const target = event.target;
        if (target.classList.contains('genre-select')) {
            const higherGenreId = target.value;

            // 子ジャンル取得のためのAJAXリクエスト
            fetch('fetch_genres.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `higher_genre_id=${encodeURIComponent(higherGenreId)}`
            })
                .then(response => response.json())
                .then(data => {
                    // 既存の子ジャンルセレクトを削除
                    const selects = Array.from(genreArea.querySelectorAll('.genre-select'));
                    const index = selects.indexOf(target);
                    for (let i = index + 1; i < selects.length; i++) {
                        selects[i].remove();
                    }

                    // 子ジャンルがある場合、新しいセレクトを横に追加
                    if (data.length > 0) {
                        const newSelect = document.createElement('select');
                        newSelect.setAttribute('name', 'genre_id[]');
                        newSelect.classList.add('form-control', 'genre-select');
                        newSelect.innerHTML = '<option value="">選択してください</option>';
                        data.forEach(genre => {
                            const option = document.createElement('option');
                            option.value = genre.genre_id;
                            option.textContent = genre.genre_name;
                            newSelect.appendChild(option);
                        });
                        genreArea.appendChild(newSelect); // 横に追加
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    );
});
