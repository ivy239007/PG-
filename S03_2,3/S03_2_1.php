<?php
if(!(isset($_POST['name']))){
//$_POST["name"]の値が空だったらLocationで指定しているファイルに強制移動（リダイレクト）させる
 header('Location:S03_2.php');
 exit;
}

$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
$kana = htmlspecialchars($_POST["kana"], ENT_QUOTES);
$gender = $_POST["gender"];
$date = htmlspecialchars($_POST["date"], ENT_QUOTES);
$addres = htmlspecialchars($_POST["pref"], ENT_QUOTES);
$tel = htmlspecialchars($_POST["tel"], ENT_QUOTES);
$email = htmlspecialchars($_POST["email"], ENT_QUOTES);


session_start();
$_SESSION['name'] = $name;
$_SESSION['kana'] = $kana;
$_SESSION['gender'] = $gender;
$_SESSION['date'] = $date;
$_SESSION['addres'] = $addres; 
$_SESSION['tel'] = $tel;
$_SESSION['email'] = $email;
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>DBに接続しているフォーム｜確認画面</title>

<link rel="stylesheet" type="text/css" href="stylesS03_2_1.css"> 
</head>

<body>
<div class="container">
<h1>確認画面</h1>
<form action="S03_2_2.php" method="post">
<dl>
<dt>お名前</dt><dd><?php echo $name ?></dd>
<dt>カナ</dt><dd><?php echo $kana ?></dd>
<dt>性別</dt><dd><?php echo $gender ?></dd>
<dt>生年月日</dt><dd><?php echo $date ?></dd>
<dt>住所</dt><dd><?php echo $addres ?></dd>
<dt>電話番号</dt><dd><?php echo $tel ?></dd>
<dt>メールアドレス</dt><dd><?php echo $email ?></dd> 
</dl>
<p>
<input type="submit" value="送信">
<input type="button" value="戻る" onclick="history.back();">
</p>
</form>
</div>
</body>
</html>