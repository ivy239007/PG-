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