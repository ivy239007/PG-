<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="styles_S01.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
    </header>

    <main>
        <form id="loginForm" action="login_test.php" method="post"> <!-- PHPファイルへのアクションを指定 -->
            <div class="form-group">
                <label for="id">I D :</label>
                <input type="text" id="id" name="id" required autofocus placeholder="ivy">
            </div>
            <div class="form-group">
                <label for="pw">PW:</label>
                <input type="password" id="pw" name="pw" required autofocus placeholder="1234">
            </div>
            <input type="submit" class="gradient1" value="ログイン">
        </form>
    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>

</body>

</html>
