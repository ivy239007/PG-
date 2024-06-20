<?php
session_start();
if (isset($_SESSION['login']) == false) {
    print 'ログインされていません。<br/>';
    print '<a href="../S01/S01_login.php">ログイン画面へ</a>';
    exit();
}
// エラーレポートをオンにする
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "172.16.3.136"; // データベースサーバーのIPアドレスまたはホスト名
$username = "sample_user"; // データベースユーザー名
$password = ""; // データベースパスワード
$dbname = "pg"; // データベース名
$port = 3306; // データベースのポート番号

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// 接続チェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// デフォルトのソート順を設定（ID の昇順）
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'Cust_asc';
$order = '';
$Cust_id_sort_url = 'Cust_idasc';
$Book_id_sort_url = 'Book_id_asc';

switch ($sort) {
    case 'Cust_id_asc':
        $order = 'Cust_id ASC';
        $id_sort_url = 'Cust_id_desc';
        break;
    case 'Cust_id_desc':
        $order = 'Cust_id DESC';
        $id_sort_url = 'Cust_id_asc';
        break;
    case 'Book_id_asc':
        $order = 'Book_id ASC';
        $Book_id_sort_url = 'Book_id_desc';
        break;
    case 'Book_id_desc':
        $order = 'Book_id DESC';
        $Book_id_sort_url = 'Book_id_asc';
        break;
    default:
        $order = 'Cust_id ASC';
        $id_sort_url = 'Cust_id_desc';
}

// SQLクエリを実行
$sql = "SELECT Cust_id, Book_id FROM Buy ORDER BY $order"; // 例としてBuyテーブルのデータを取得
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
                <div class="centered-text">売上ランキング</div>
                
                <div class="table-container">
                    <?php
                    // 結果が1行以上の場合データを表示
                    if ($result->num_rows > 0) {
                        // データをHTMLテーブルとして出力
                        echo "<table><tr>";
                        echo "<th><a href='?sort=$Cust_id_sort_url'>Cust_id " . ($sort == 'Cust_id_asc' ? '▲' : '▼') . "</a></th>";
                        echo "<th><a href='?sort=$Book_id_sort_url'>Book_id " . ($sort == 'Book_id_asc' ? '▲' : '▼') . "</a></th>";
                        echo "</tr>";
                        
                        // 各行のデータを出力
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Cust_id"] . "</td>";
                            echo "<td>" . $row["Book_id"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    // 接続を閉じる
                    $conn->close();
                    ?>
                </div>

                <form id="redirectForm">
                    <input type="submit" class="custom-button3" value="年代別ランキング" onclick="event.preventDefault(); location.href='../S02/S02_menu.php'">
                    <input type="submit" class="custom-button3" value="地域別ランキング" onclick="event.preventDefault(); location.href='../S02/S02_menu.php'">
                    <button class="custom-button-back" onclick="event.preventDefault(); location.href='../S02/S02_menu.php'">戻る</button>
                </form> 
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
