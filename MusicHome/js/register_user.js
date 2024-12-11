new Vue({
    el: '#app',
    data: {
        mail_address1: '',
        user_name: '',
        password1: '',
        password2: '',
        post_number: '',
        prefecture: '',
        city: '',
        house_number: '',
        house_name: '',
        sei: '',
        mei: '',
        sei_huri: '',
        mei_huri: '',
        errors: {
            mail_address1: '',
            user_name: '',
            password1: '',
            password2: '',
            post_number: '',
        }
    },
    computed: {
        hasErrors() {
            return Object.values(this.errors).some(error => error);
        }
    },
    methods: {
        validateEmail() {
            if (this.mail_address1 != '') {
                this.errors.mail_address1 = this.mail_address1.match(/^\S+@\S+\.\S+$/) ? '' : '正しいメールアドレスを入力してください。';
            }
        },
        validateUserName() {
            if (this.user_name != '') {
                this.errors.user_name = this.user_name.match(/^[a-zA-Z0-9]{6,}$/) ? '' : 'ユーザー名は6文字以上の英数字を入力してください。';
            }
        },
        validatePassword() {
            if (this.password1 != '') {
                this.errors.password1 = this.password1.length >= 6 ? '' : 'パスワードは6文字以上必要です。';
            }
        },
        validatePasswordMatch() {
            if (this.password2 != '') {
                this.errors.password2 = this.password1 === this.password2 ? '' : 'パスワードが一致しません。';
            }
        },
        validatePostNumber() {
            if (this.post_number != '') {
                this.errors.post_number = this.post_number.match(/^\d{7}$/) ? '' : '郵便番号は7桁の数字を入力してください。';
            }
        },
        handleSubmit() {
            showOverlayMessage('登録が完了しました');
        },
        goBack() {
            window.location.href = 'login.php';
        }
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
        overlay.classList.add('hidden'); // オーバーレイを非表示にする
        window.location.href = 'login.php'; // top.phpに遷移
    }, 1500); // 1.5秒後に非表示＆遷移
}