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

<div class="container">
<h1>入力画面</h1>
<form action="confirm.php" method="post">
<dl>
<dt>お名前</dt><dd><input type="text" name="name" required placeholder="山田 太郎"></dd>
<dt>メールアドレス</dt><dd><input type="email" name="email" required></dd>

<dt>性別</dt>
<dd>
<input type="radio" name="gender" value="男性" checked id="man"><label for="man">男性</label>
<input type="radio" name="gender" value="女性" id="woman"><label for="woman">女性</label>
</dd>


<dt>お問い合わせ内容</dt><dd><textarea name="message" required cols="40" rows="5"></textarea></dd> 
</dl>
<p><input type="submit" value="確認画面へ"></p>
</form>
</div>
</body>
</html>