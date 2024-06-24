<?php
session_start();
if (!isset($_SESSION['login'])) {
    print 'ログインされていません。<br/>';
    print '<a href="../S01/S01_login.php">ログイン画面へ</a>';
    exit();
}

// エラーレポートをオンにする
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "172.16.3.136";
$username = "sample_user";
$password = "";
$dbname = "pg";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT books.Book_name, books.Author, books.Price, books.Publisher,
        SUM(buy.Purchase_number) AS uriagerank
        FROM buy 
        INNER JOIN books ON buy.Book_id = books.Book_id
        GROUP BY books.Book_id
        ORDER BY uriagerank DESC"; // テーブルのデータを取得
$result = $conn->query($sql);
?>
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
            <div class="content">
                <div class="centered-text">年代別ランキング</div>

                <div class="button-container">
                    <form id="redirectForm">
                        <input type="submit" class="custom-button3" value="売上ランキング" onclick="event.preventDefault(); location.href='../S05/S05.php'">
                        <input type="submit" class="custom-button3" value="地域別ランキング" onclick="event.preventDefault(); location.href='../S05/S05_area.php'">
                    </form>
                </div>

                <div class="table-container">
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table><tr>";
                        echo "<th>書籍名</th>";
                        echo "<th>著者</th>";
                        echo "<th>価格</th>";
                        echo "<th>出版社</th>";
                        echo "<th>売上数</th>";
                        echo "</tr>";
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["Book_name"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Author"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Price"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Publisher"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["uriagerank"]) . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                    ?>
                </div>

                <button class="custom-button-back" onclick="event.preventDefault(); location.href='../S02/S02_menu.php'">戻る</button>
            </div>
        </main>

        <footer>
            © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
        </footer>

        <script>
            function redirectTo(url) {
                window.location.href = url;
            }
        </script>
    </div>
</body>
</html>
