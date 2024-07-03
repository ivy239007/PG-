<?php
// セッションの開始
session_start();

$book_title = $_SESSION['book_title'];
$author_name = $_SESSION['author_name'];
$price = $_SESSION['price'];
$publication_date = $_SESSION['publication_date'];
$pref = $_SESSION['pref'];
$qref = $_SESSION['qref'];
//サーバーに保存されているsessionデータを変数に代入
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>送信画面</title>
    <link rel="stylesheet" type="text/css" href="S04_2_2.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
        </style>
</head>

<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo"> 
    </header>
       <main>
       <div class="container">
            <p>完了しました。</p>
            <p>お問い合わせありがとうございました。</p>
        </div>
        <button onclick="location.href='../S04/S04.php'" type="button" name="name" value="value" id="BackButton">書籍管理画面に戻る</button>
       </main> 
</body>
</html>

<?php
// DB接続設定
$user = 'sample_user';//DBユーザー名
$pass = '';//DBパスワード

 //DBに接続
$dsn = 'mysql:host=172.16.3.136;dbname=pg;charset=utf8';
$conn = new PDO($dsn, $user, $pass);
//「$conn」は、任意のオブジェクト名

switch($pref){
    case "講談社":
        $pref = 1;
        break;
    case "KADOKAWA":
        $pref = 2;
        break;
    case "集英社":
        $pref = 3;
        break;
    }

switch ($qref) {
    case "文学・評論" :
        $qref = 1;
        break;
    case "人文・思想":
        $qref = 2;
        break;
    case "社会・政治":
        $qref = 3;
        break;
    case "歴史・地理":
        $qref = 4;
        break; 
    case "ビジネス・経済":
        $qref = 5;
        break;
    case "投資・金融":
        $qref = 6;
        break;
    case "科学・テクノロジー":
        $qref = 7;
        break;
    case "医学・薬学":
        $qref = 8;
        break;
    case "コンピュータ・IT":
        $qref = 9;
        break;
    case "アート・デザイン":
        $qref = 10;
        break;
    case "趣味・実用":
        $qref = 11;
        break;
    case "スポーツ・アウトドア":
        $qref = 12;
        break;
    case "資格・検定":
        $qref = 13;
        break;
    case "暮らし・健康":
        $qref = 14;
        break;
    case "旅行ガイド":
        $qref = 15;
        break;
    case "語学・辞事典":
        $qref = 16;
        break;
    case "教育・受験":
        $qref = 17;
        break;
    case "絵本・児童書":
        $qref = 18;
        break;
    case "ゲームブック":
        $qref = 19;
        break;
    case "エンターテイメント":
        $qref = 20;
        break;
    case "雑誌":
        $qref = 21;
        break;
    case "楽譜・音楽書":
        $qref = 22;
        break;
    case "古書":
        $qref = 23;
        break;
}

// データの追加
$sql = 'INSERT INTO books(Book_name, Author, price, Book_Publication,Publisher,Categories_id ) VALUES("'.$book_title.'","'.$author_name.'","'.$price.'","'.$publication_date.'","'.$pref.'","'.$qref.'")';

$stmt = $conn -> prepare($sql);
$stmt -> execute();

//最後にセッション情報を破棄
session_destroy();
?>