<?php
session_start();
if(isset($_SESSION['login'])==false){
    print'ログインされていません。<br/>';
    print'<a href="../PG/S01/S01_login.php">ログイン画面へ</a>';
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
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'Book_id_asc';
$order = '';
$Book_id_sort_url = 'Book_id_asc';
$Categories_id_sort_url = 'Categories_id_asc';
$Publisher_sort_url = 'Publisher_asc';
$Book_name_sort_url = 'Book_name_asc';
$Book_Publication_sort_url = 'Book_Publication_asc';
$Author_sort_url = 'Author_asc';
$Price_sort_url = 'Price_asc';

switch ($sort) {
    case 'Book_id_asc':
        $order = 'Book_id ASC';
        $Book_id_sort_url = 'Book_id_desc';
        break;
    case 'Book_id_desc':
        $order = 'Book_id DESC';
        $Book_id_sort_url = 'Book_id_asc';
        break;
    case 'Categories_id_asc':
        $order = 'Categories_id ASC';
        $Categories_id_sort_url = 'Categories_id_desc';
        break;
    case 'Categories_id_desc':
        $order = 'Categories_id DESC';
        $Categories_id_sort_url = 'Categories_id_asc';
        break;
    case 'Publisher_asc':
        $order = 'Publisher ASC';
        $Publisher_sort_url = 'Publisher_desc';
        break;
    case 'Publisher_desc':
        $order = 'Publisher DESC';
        $Publisher_sort_url = 'Publisher_asc';
        break;
    case 'Book_name_asc':
        $order = 'Book_name ASC';
        $Book_name_sort_url = 'Book_name_desc';
        break;
    case 'Book_name_desc':
        $order = 'Book_name DESC';
        $Book_name_sort_url = 'Book_name_asc';
        break;
    case 'Book_Publication_asc':
        $order = 'Book_Publication ASC';
        $Book_Publication_sort_url = 'Book_Publication_desc';
        break;
    case 'Book_Publication_desc':
        $order = 'Book_Publication DESC';
        $Book_Publication_sort_url = 'Book_Publication_asc';
        break;
    case 'Author_asc':
        $order = 'Author ASC';
        $Author_sort_url = 'Author_desc';
        break;
    case 'Author_desc':
        $order = 'Author DESC';
        $Author_sort_url = 'Author_asc';
        break;
    case 'Price_asc':
        $order = 'Price ASC';
        $Price_sort_url = 'Price_desc';
        break;
    case 'Price_desc':
        $order = 'Price DESC';
        $Price_sort_url = 'Price_asc';
        break;
    default:
        $order = 'Book_id ASC';
        $Book_id_sort_url = 'Book_id_desc';
}

// 検索条件の設定
$searchChoice = isset($_POST['searchChoice']) ? $_POST['searchChoice'] : '';
$kensaku = isset($_POST['kensaku']) ? $_POST['kensaku'] : '';

// SQLクエリの作成
$sql = "SELECT Book_id, Categories_id, Publisher, Book_name, Book_Publication, Author, Price FROM books";

if ($kensaku != '') {
    if ($searchChoice == 'aimai') {
        $likeKeyword = "%" . $conn->real_escape_string($kensaku) . "%";
        $sql .= " WHERE Book_name LIKE '$likeKeyword' OR Book_id LIKE '$likeKeyword'";
    } else {
        $sql .= " WHERE Book_name = '$kensaku' OR Book_id = '$kensaku'" ;
    } 
}
$sql .= " ORDER BY $order";

// SQLクエリを実行
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset ="utf-8">
  <title>本管理画面</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
  </style>
    <link rel="stylesheet" type="text/css" href="S04.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <form action="" method="post">
            <div class="search">
                <input type="text" size="80" name="kensaku">
                <input type="submit" value="検索">
            </div>
            <div class="radiobutton">
                <input type="radio" id="searchChoice1" name="searchChoice" value="aimai" />
                <label for="searchChoice1">あいまい検索</label>
                <input type="radio" id="searchChoice2" name="searchChoice" value="icchi" />
                <label for="searchChoice2">一致検索</label>
            </div>
        </form>
    </header>
    
    <main>
        <div class = "touroku">
            <button onclick="location.href='../S04_2,3/S04_2.php'" type="button" name="name" value="value" id = "tourokuButton">新規登録</button>
            <button type="button" name="name" value="value" id = "tourokuButton">削除</button>
        </div>
        
        <div class="DatabaseTable" id="DatabaseTable">
        <?php
        // 結果が1行以上の場合データを表示
        if ($result->num_rows > 0) {
            // データをHTMLテーブルとして出力
            echo "<table><tr>";
            echo "<th><a href='?sort=$Book_id_sort_url'>本ID " . ($sort == 'Book_id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Categories_id_sort_url'>カテゴリID " . ($sort == 'Categories_id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Publisher_sort_url'>出版社 " . ($sort == 'Publisher_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Book_name_sort_url'>本の名前 " . ($sort == 'Book_name_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Book_Publication_sort_url'>出版日 " . ($sort == 'Book_Publication_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Author_sort_url'>著者 " . ($sort == 'Author_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Price_sort_url'>価格 " . ($sort == 'Price_asc' ? '▲' : '▼') . "</a></th>";
            echo "</tr>";
            
            // 各行のデータを出力
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["Book_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Categories_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Publisher"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Book_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Book_Publication"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Author"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["Price"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "データがありません";
        }
        // 接続を閉じる
        $conn->close();
        ?>
        </div>
          <button onclick="location.href='../S02/S02_menu.php'" type="button" name="name" value="value" id="BackButton">戻る</button>  
    </main>
        <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>
