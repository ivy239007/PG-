<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>メイン画面</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="styles_S05.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
        
        <div id="container">
        <header id="header">
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
    </header>

    

    <main>
        <p class="centered-text">売上ランキング</p>
            <form id="redirectForm">
            <input type="submit" class="custom-button3" value="年代別ランキング" onclick="event.preventDefault(); location.href='../S02/S02_menu.php'">
            <input type="submit" class="custom-button3" value="地域別ランキング" onclick="event.preventDefault(); location.href='../S02_menu.php'">
            <button class="custom-button-back" onclick="event.preventDefault(); location.href='../S02/S02_menu.php'">戻る</button>        </form>

        </form>

    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>

</body>
</html>
