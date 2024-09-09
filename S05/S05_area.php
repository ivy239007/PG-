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

$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'total';
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

$sql = "SELECT customers.Cust_id, books.Book_name, state.state, 
        SUM(buy.Purchase_number) AS total 
        FROM state 
        INNER JOIN customers ON state.State_id = customers.State_id 
        INNER JOIN buy ON customers.Cust_id = buy.Cust_id 
        INNER JOIN books ON buy.Book_id = books.Book_id 
        GROUP BY customers.Cust_id, books.Book_name, state.state 
        ORDER BY $sort_column $sort_order";
$result = $conn->query($sql);

function getSortLink($column, $label) {
    $sort_order = 'ASC';
    $arrow = '▲';
    if (isset($_GET['sort']) && $_GET['sort'] == $column) {
        if ($_GET['order'] == 'ASC') {
            $sort_order = 'DESC';
            $arrow = '▼';
        }
    }
    return "<a href=\"?sort=$column&order=$sort_order\">$label $arrow</a>";
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
    <link rel="stylesheet" type="text/css" href="styles_S05.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
    <div id="container">
        <header id="header">
            <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
            <div class="centered-text">地域別ランキング</div>

        </header>

        <main>
            <div class="content">

                <div class="button-container">
                    <form id="redirectForm">
                        <input type="submit" class="custom-button3" value="売上ランキング" onclick="event.preventDefault(); location.href='../S05/S05.php'">
                        <input type="submit" class="custom-button3" value="年代別ランキング" onclick="event.preventDefault(); location.href='../S05/S05_age.php'">
                    </form>
                </div>

                <div class="table-container">
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table><tr>";
                        echo "<th>" . getSortLink('Book_name', '書籍名') . "</th>";
                        echo "<th>" . getSortLink('state', '都道府県') . "</th>";
                        echo "<th>" . getSortLink('total', '合計') . "</th>";
                        echo "</tr>";
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["Book_name"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["state"]) . "</td>";
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
