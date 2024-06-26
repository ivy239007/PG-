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


$sql = "SELECT books.Book_name,
               CASE
                   WHEN customers.Age BETWEEN 0 AND 9 THEN '幼少期'
                   WHEN customers.Age BETWEEN 10 AND 19 THEN '10代'
                   WHEN customers.Age BETWEEN 20 AND 29 THEN '20代'
                   WHEN customers.Age BETWEEN 30 AND 39 THEN '30代'
                   WHEN customers.Age BETWEEN 40 AND 49 THEN '40代'
                   WHEN customers.Age BETWEEN 50 AND 59 THEN '50代'
                   WHEN customers.Age BETWEEN 60 AND 69 THEN '60代'
                   WHEN customers.Age BETWEEN 70 AND 79 THEN '70代'
                   WHEN customers.Age BETWEEN 80 AND 89 THEN '80代'
                   WHEN customers.Age BETWEEN 90 AND 99 THEN '90代'
                   ELSE 'その他'
               END AS Age_Group,
               COUNT(customers.Age) AS total
        FROM customers
        INNER JOIN buy ON customers.Cust_id = buy.Cust_id
        INNER JOIN books ON buy.Book_id = books.Book_id
        GROUP BY Age_Group, books.Book_name
        ORDER BY Age_Group ASC, total DESC;"; // テーブルのデータを取得
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
                        echo "<th>年代</th>";
                        echo "<th>売上数</th>";
                        echo "</tr>";
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["Book_name"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Age_Group"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["total"]) . "</td>";
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
