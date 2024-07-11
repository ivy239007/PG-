<?php
// S04_2_1.php ファイル内の処理例
//※4行目から17行目の処理は無くても実行される。
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST データを取得
    $book_title = $_POST['book_title'];
    $author_name = $_POST['author_name'];
    $price = $_POST['price'];
    $publication_date = $_POST['publication_date'];
    $pref = $_POST['pref'];
    $qref = $_POST['qref'];

    // 値段（price）を半角に変換
    $price = mb_convert_kana($price, "n");

    // 他の処理をここに記述
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <title>書籍新規登録</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="stylesS04_2.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo"> 
        <p>書籍新規登録フォーム</p>
    </header>
    
    <main>
        <form action="S04_2_1.php" method="post">
            <div class="form-group">
                <label for="bookname">書&nbsp;&nbsp;籍&nbsp;&nbsp;名</label>
                <input type="text" id="name" name="book_title" required autofocus placeholder="アイビー">                
            </div>
            
            <div class="form-group">
                <label for="author">著&nbsp;&nbsp;作&nbsp;&nbsp;者</label>
                <input type="text" id="name" name="author_name" required autofocus placeholder="永楽 仁八">                
            </div>

            <div class="form-group">
                <label for="price">価&emsp;&emsp;格</label>
                <td>
                    <input type="text" name="price" required autofocus placeholder="1234">
                </td>
            </div>

            <div class="form-group">
                <label for="date-edit">刊&nbsp;&nbsp;行&nbsp;&nbsp;日</label>
                <input type="date" id="date" name = "publication_date" value="2000-01-01" required>
            </div>


            <div class="form-group">
                <label for="adress">出&nbsp;&nbsp;版&nbsp;&nbsp;社</label>
                <select name="pref">
                    <option value="">選択してください</option>
                    <option value="講談社" selected>講談社</option>
                    <option value="KADOKAWA">KADOKAWA</option>
                    <option value="集英社">集英社</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="adress">分&emsp;&emsp;類</label>
                <select name="qref">
                    <option value="">選択してください</option>
                    <option value="文学・評論" selected>文学・評論</option>
                    <option value="人文・思想">人文・思想</option>
                    <option value="社会・政治">社会・政治</option>
                    <option value="歴史・地理">歴史・地理</option>
                    <option value="ビジネス・経済">ビジネス・経済</option>
                    <option value="投資・金融">投資・金融</option>
                    <option value="科学・テクノロジー">科学・テクノロジー</option>
                    <option value="医学・薬学">医学・薬学</option>
                    <option value="コンピュータ・IT">コンピュータ・IT</option>
                    <option value="アート・デザイン">アート・デザイン</option>
                    <option value="趣味・実用">趣味・実用</option>
                    <option value="スポーツ・アウトドア">スポーツ・アウトドア</option>
                    <option value="資格・検定">資格・検定</option>
                    <option value="暮らし・健康">暮らし・健康</option>
                    <option value="旅行ガイド">旅行ガイド</option>
                    <option value="語学・辞事典">語学・辞事典</option>
                    <option value="教育・受験">教育・受験</option>
                    <option value="絵本・児童書">絵本・児童書</option>
                    <option value="ゲームブック">ゲームブック</option>
                    <option value="エンターテイメント">エンターテイメント</option>
                    <option value="雑誌">雑誌</option>
                    <option value="楽譜・音楽書">楽譜・音楽書</option>
                    <option value="古書">古書</option>

                </select>
            </div>

            <input type="submit" value="登録">
        </form>
        <button onclick="location.href='../S04/S04.php'" type="button" name="name" value="value" id="BackButton">戻る</button>
    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
        <div class="back">
        </div>

    </footer>
</body>
</html>
