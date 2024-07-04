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

    // ログアウトページにリダイレクト
    header('Location: logout_message.php');
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
            <img src="../graphic/ニトリロゴ.jpg" alt="Loading Logo" >
        </div>
    </div>
    <div class="splashbg"></div><!---画面遷移用-->
    
    <div id="container">
    <header id="header">
        <a href="S02_menu.php"><img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo"></a>
        <button class="custom-buttonlog" onclick="logout()">ログアウト</button>
    </header>

    <main>
        <form id="redirectForm">
            <input type="submit" class="custom-button3" value="顧客管理" onclick="event.preventDefault(); location.href='../S03/S03.php'">
            <input type="submit" class="custom-button3" value="書籍管理" onclick="event.preventDefault(); location.href='../S04/S04.php'">
            <input type="submit" class="custom-button3" value="データ分析" onclick="event.preventDefault(); location.href='../S05/S05.php'">
        </form>
    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>

    <script>
        function logout() {
            window.location.href = 'logout_message.php';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="S02.js"></script>
</body>
</html>
