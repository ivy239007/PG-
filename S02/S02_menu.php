<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // データベース接続を閉じる（例）
    if (isset($_SESSION['db_connection'])) {
        $conn = $_SESSION['db_connection'];
        $conn->close();
        unset($_SESSION['db_connection']);
    }

    // セッションを破棄
    session_destroy();

    // ログインページにリダイレクト
    header('Location: S01/S01_login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>メイン画面</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="styles_S02.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
    <div id="splash">
        <div id="splash-logo">
            <img src="../graphic/ニトリロゴ.jpg" alt="Loading Logo">
        </div>
    </div>
    <div class="splashbg"></div><!---画面遷移用-->
    
    <div id="container">
    <header id="header">
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <button class="custom-buttonlog" onclick="logout()">ログアウト</button>
    </header>

    <main>
        <form id="redirectForm">
            <input type="submit" class="custom-button3" value="顧客管理" onclick="event.preventDefault(); location.href='../S03/S03.html'">
            <input type="submit" class="custom-button3" value="書籍管理" onclick="event.preventDefault(); location.href='../S04/S04.html'">
            <input type="submit" class="custom-button3" value="データ分析" onclick="event.preventDefault(); location.href='../S05/S05.html'">
        </form>
    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>

    <script>
        function logout() {
            window.location.href = 'index.php?action=logout';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="test.js"></script>
</body>
</html>
