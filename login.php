<!DOCTYPE html>
<html>
<head>
    <title>ログイン画面</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <img src="logo/ニトリロゴ.jpg" alt="Logo" class="logo">
    </header>

    <main>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="pw">PW:</label>
                <input type="password" id="pw" name="pw">
            </div>
            <input type="submit" value="ログイン">
        </form>
    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>
