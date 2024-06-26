<!DOCTYPE HTML>
<html lang="ja">


<head>
    <meta charset="utf-8">
    <title>顧客新規登録</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="stylesS03_2.css">
</head>

<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <p>顧客新規登録フォーム</p> 
    </header>
    <main>
        <div class="container">
            <form action="login.php" method="post">
                <dl>
                <dt>顧客名</dt><dd><input type="text" name="name" required placeholder="赤嶺昂太"></dd>
                <dt>フリガナ</dt><dd><input type="text" name="name" required placeholder="アカミネコウ"></dd>
                <dt>性別</dt><dd>
                    <input type="radio" name="gender" value="男性" checked id="man"><label for="man">男性</label>
                    <input type="radio" name="gender" value="女性" id="woman"><label for="woman">女性</label></dd>
                <dt>生年月日</dt><dd><input type="date" id="date" name="name" value="2000-01-01" required></dd>
                <dt>住所</dt>
                    <select name="pref">
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県" selected>大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option></select></dd>
                <dt>電話番号</dt><dd><input type="tel" name="tel" required placeholder="097-537-2471"></dd>
                <dt>メールアドレス</dt><dd><input type="email" name="email" required placeholder="info@ivy.ac.jp"></dd>
        </div>
        <div class="Btn">
            <input type="submit" value="登録">
        </div>
        <button onclick="location.href='../S03/S03.html'" type="button" name="name" value="value" id="BackButton">戻る</button>
    </main>
    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
        <div class="back">

        </div>
    </footer>
</body>
</html>