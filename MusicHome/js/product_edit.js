document.querySelector('.update').addEventListener('click', async function (event) {
    event.preventDefault(); // 通常の動作を防ぐ

    // 最下層のジャンルを取得
    const genreSelects = Array.from(document.querySelectorAll('.genre-select'));
    const selectedGenreIds = genreSelects
        .map(select => select.value)
        .filter(value => value !== ''); // 未選択の値を除外

    const lastGenreId = selectedGenreIds[selectedGenreIds.length - 1] || null;

    // 入力データを収集
    const formData = {
        action: 'product_update',
        product_name: document.querySelector('input[name="product_name"]').value,
        brand: document.querySelector('input[name="brand"]').value,
        old_genre_id: document.querySelector('input[name="old_genre_id"]').value,
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
            const old_genre_name = document.getElementById('old-genre-name');
            old_genre_name.textContent = result.old_genre_name.toLocaleString();
            const old_genre_id = document.getElementById('old-genre-id');
            old_genre_id.value = result.old_genre_id.toLocaleString();
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

// 入力欄でイベントリスナーを追加
document.addEventListener('input', function (e) {
    // 入力欄が .text-box クラスの場合のみ処理
    if (e.target.classList.contains('text-box')) {
        updateImagePreview();
    }
});

document.addEventListener('DOMContentLoaded', updateImagePreview);

// 画像プレビューを更新する関数
function updateImagePreview() {
    const mainImageInput = document.querySelector('input[name="main_image"]');
    let allInputs = Array.from(document.querySelectorAll('input[name="sub_image[]"]')); // NodeList を配列に変換
    const previewContainer = document.querySelector('.image-preview-area');

    // プレビューコンテナをクリア
    previewContainer.innerHTML = '';

    // main_image を allInputs の最初に追加
    if (mainImageInput && mainImageInput.value.trim()) {
        const mainImage = document.createElement('input');
        mainImage.value = mainImageInput.value.trim();
        allInputs.unshift(mainImage); // 配列の先頭に追加
    }

    // 各入力欄からURLを取得して画像を表示
    allInputs.forEach(input => {
        const url = input.value.trim();
        if (url) {
            const img = document.createElement('img');
            img.src = url;
            img.alt = 'プレビュー画像';
            img.style.width = '100px'; // 適宜サイズ調整
            img.style.marginRight = '10px';
            img.onerror = () => {
                img.style.display = 'none'; // 無効なURLの場合非表示にする
            };
            previewContainer.appendChild(img);
        }
    });
}