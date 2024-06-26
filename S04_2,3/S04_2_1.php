<?php
if(!(isset($_POST['book_title']))){
//$_POST["name"]の値が空だったらLocationで指定しているファイルに強制移動（リダイレクト）させる
 header('Location:S04_2.php');
 exit;
}

$book_title = htmlspecialchars($_POST["book_title"], ENT_QUOTES);
$author_name = htmlspecialchars($_POST["author_name"], ENT_QUOTES);
$price = htmlspecialchars($_POST["price"], ENT_QUOTES);
$publication_date = htmlspecialchars($_POST["publication_date"], ENT_QUOTES);
$pref = htmlspecialchars($_POST["pref"], ENT_QUOTES);
$qref = htmlspecialchars($_POST["qref"], ENT_QUOTES);


session_start();
$_SESSION['book_title'] = $book_title;
$_SESSION['author_name'] = $author_name;
$_SESSION['price'] = $price;
$_SESSION['publication_date'] = $publication_date;
$_SESSION['pref'] = $pref; 
$_SESSION['qref'] = $qref;
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>DBに接続しているフォーム｜確認画面</title>
<link rel="stylesheet" href="css/form.css">
</head>

<body>
<div class="container">
<h1>確認画面</h1>
<form action="S04_2_2.php" method="post">
<dl>
<dt>書籍名</dt><dd><?php echo $book_title ?></dd>
<dt>著作者</dt><dd><?php echo $author_name ?></dd>
<dt>値段</dt><dd><?php echo $price ?></dd>
<dt>刊行日</dt><dd><?php echo $publication_date ?></dd>
<dt>出版社</dt><dd><?php echo $pref ?></dd>
<dt>分類</dt><dd><?php echo $qref ?></dd> 
</dl>
<p>
<input type="submit" value="送信">
<input type="button" value="戻る" onclick="history.back();">
</p>
</form>
</div>
</body>
</html>