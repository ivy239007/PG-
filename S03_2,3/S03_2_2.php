<?php
// セッションの開始
session_start();

$name = $_SESSION['name'];
$kana = $_SESSION['kana'];
$gender = $_SESSION['gender'];
$date = $_SESSION['date'];
$addres = $_SESSION['addres'];
$tel = $_SESSION['tel'];
$email = $_SESSION['email'];
//サーバーに保存されているsessionデータを変数に代入
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>DBに接続しているフォーム｜送信画面</title>
</head>

<body>
<div class="container">
<h1>完了しました。</h1>
<p>お問い合わせありがとうございました。</p>
<?php
// DB接続設定
$user = 'sample_user';//DBユーザー名
$pass = '';//DBパスワード

//DBに接続
$dsn = 'mysql:host=172.16.3.136;dbname=pg;charset=utf8';
$conn = new PDO($dsn, $user, $pass);
//「$conn」は、任意のオブジェクト名

switch($addres){
    case "北海道":
        $addres = 1;
        break;
    case "青森県":
        $addres = 2;
        break;
    case "岩手県":
        $addres = 3;
        break;
    case "宮城県":
        $addres = 4;
        break;
    case "秋田県":
        $addres = 5;
        break;
    case "山形県":
        $addres = 6;
        break;
    case "福島県":
        $addres = 7;
        break;
    case "茨城県":
        $addres = 8;
        break;
    case "栃木県":
        $addres = 9;
        break;
    case "群馬県":
        $addres = 10;
        break;
    case "埼玉県":
        $addres = 11;
        break;
    case "千葉県":
        $addres = 12;
        break;
    case "東京都":
        $addres = 13;
        break;
    case "神奈川県":
        $addres = 14;
        break;
    case "新潟県":
        $addres = 15;
        break;
    case "富山県":
        $addres = 16;
            break;
    case "石川県":
        $addres = 17;
        break;
    case "福井県":
        $addres = 18;
        break;
    case "山梨県":
        $addres = 19;
        break;
    case "長野県":
        $addres = 20;
        break;
    case "岐阜県":
        $addres = 21;
        break;
    case "静岡県":
        $addres = 22;
        break;
    case "愛知県":
        $addres = 23;
        break;
    case "三重県":
        $addres = 24;
        break;
    case "滋賀県":
        $addres = 25;
        break;
    case "京都府":
        $addres = 26;
        break;
    case "大阪府":
        $addres = 27;
        break;
    case "兵庫県":
        $addres = 28;
        break;
    case "奈良県":
        $addres = 29;
        break;
    case "和歌山県":
        $addres = 30;
        break;
    case "鳥取県":
        $addres = 31;
        break;
    case "島根県":
        $addres = 32;
        break;
    case "岡山県":
        $addres = 33;
        break;
    case "広島県":
        $addres = 34;
        break;
    case "山口県":
        $addres = 35;
        break;
    case "徳島県":
        $addres = 36;
        break;
    case "香川県":
        $addres = 37;
        break;
    case "愛媛県":
        $addres = 38;
        break;
    case "高知県":
        $addres = 39;
        break;
    case "福岡県":
        $addres = 40;
        break;
    case "佐賀県":
        $addres = 41;
        break;
    case "長崎県":
        $addres = 42;
        break;
    case "熊本県":
        $addres = 43;
        break;
    case "大分県":
        $addres = 44;
        break;
    case "宮崎県":
        $addres = 45;
        break;
    case "鹿児島県":
        $addres = 46;
        break;
    case "沖縄県":
        $addres = 47;
        break;
}
switch ($gender) {
    case "男性":
        $gender = 1;
        break;
    case "女性":
        $gender = 2;
        break;
    case "その他":
        $gender = 3;
        break;
}
// データの追加
$sql = 'INSERT INTO customers(Name, Kana,Tel, Gender, Birth_day,Mail_address,State_id) VALUES("'.$name.'","'.$kana.'","'.$tel.'","'.$gender.'","'.$date.'","'.$email.'","'.$addres.'")';

$stmt = $conn -> prepare($sql);
$stmt -> execute();

//最後にセッション情報を破棄
session_destroy();
?>
</div>
</body>
</html>