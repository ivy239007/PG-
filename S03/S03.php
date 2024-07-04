<?php
session_start();
if(isset($_SESSION['login'])==false){
    print'ログインされていません。<br/>';
    print'<a href="../S01/S01_login.php">ログイン画面へ</a>';
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
$Cust_id_sort_url = 'Cust_id_asc';
$Name_sort_url = 'Name_asc';
$State_id_sort_url = 'State_id_asc';
$Gender_sort_url = 'Gender_asc';
$Birth_day_sort_url = 'Birth_day_asc';

switch ($sort) {
    case 'Cust_id_asc':
        $order = 'Cust_id ASC';
        $Cust_id_sort_url = 'Cust_id_desc';
        break;
    case 'Cust_id_desc':
        $order = 'Cust_id DESC';
        $Cust_id_sort_url = 'Cust_id_asc';
        break;
    case 'Name_asc':
        $order = 'Name ASC';
        $Name_sort_url = 'Name_desc';
        break;
    case 'Name_desc':
        $order = 'Name DESC';
        $Name_sort_url = 'Name_asc';
        break;
    case 'State_id_asc':
        $order = 'State_id ASC';
        $State_id_sort_url = 'State_id_desc';
        break;
    case 'State_id_desc':
        $order = 'State_id DESC';
        $State_id_sort_url = 'State_id_asc';
        break;
    case 'Gender_asc':
        $order = 'Gender ASC';
        $Gender_sort_url = 'Gender_desc';
        break;
    case 'Gender_desc':
        $order = 'Gender DESC';
        $Gender_sort_url = 'Gender_asc';
        break;
    case 'Birth_day_asc':
        $order = 'Birth_day ASC';
        $Birth_day_sort_url = 'Birth_day_desc';
        break;
    case 'Birth_day_desc':
        $order = 'Birth_day DESC';
        $Birth_day_sort_url = 'Birth_day_asc';
        break;
    default:
        $order = 'Cust_id ASC';
        $Cust_id_sort_url = 'Cust_id_desc';
}

// 検索条件の設定
$searchChoice = isset($_POST['searchChoice']) ? $_POST['searchChoice'] : '';
$kensaku = isset($_POST['kensaku']) ? $_POST['kensaku'] : '';

// デバッグ用出力
// echo "検索タイプ: $searchChoice<br>";
// echo "検索キーワード: $kensaku<br>";

// SQLクエリの作成
$sql = "SELECT customers.Cust_id, customers.Name, state.state, customers.State_id, customers.Gender, customers.Birth_day
FROM Customers
INNER JOIN state ON customers.State_id = state.State_id";
if ($kensaku != '') {
    if ($searchChoice == 'aimai') {
        $likeKeyword = "%" . $conn->real_escape_string($kensaku) . "%";
        $sql .= " WHERE Name LIKE '$likeKeyword' OR Cust_id LIKE '$likeKeyword'";
    } else {
        $sql .= " WHERE Name = '$kensaku' OR Cust_id = '$kensaku'" ;
    } 
}
$sql .= " ORDER BY $order";

// デバッグ用出力
// echo "SQLクエリ: $sql<br>";

// SQLクエリを実行
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset ="utf-8">
  <title>顧客管理画面</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
  </style>
    <link rel="stylesheet" type="text/css" href="S03.css">
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
            <button onclick="location.href='../S03_2,3/S03_2.php'" type="button" name="name" value="value" id = "tourokuButton">新規登録</button>
        </div>
        
        <div class="DatabaseTable" id="DatabaseTable">
        <?php
        // 結果が1行以上の場合データを表示
        if ($result->num_rows > 0) {
            // データをHTMLテーブルとして出力
            echo "<table><tr>";
            echo "<th><a href='?sort=$Cust_id_sort_url'>顧客ID " . ($sort == 'Cust_id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Name_sort_url'>顧客名 " . ($sort == 'Name_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$State_id_sort_url'>都道府県 " . ($sort == 'State_id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Gender_sort_url'>性別 " . ($sort == 'Gender_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Birth_day_sort_url'>生年月日 " . ($sort == 'Birth_day_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th>編集</th>"; // 操作列の追加
            echo "<th>削除</th>"; // 操作列の追加
            echo "</tr>";
            

            // 各行のデータを出力
            while ($row = $result->fetch_assoc()) {
                // 性別の表示を「1」なら「男性」、「2」なら「女性」「３」ならその他に変換
                $gender_display = ($row["Gender"] == "1") ? "男性" : (($row["Gender"] == "2") ? "女性" : "その他");
                echo "<tr>";
                echo "<td>" . $row["Cust_id"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $gender_display . "</td>";
                echo "<td>" . $row["Birth_day"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["Cust_id"] . "'>編集</a></td>";
                echo "<td><a href='delete.php?id=" . $row["Cust_id"] . "' onclick=\"return confirm('本当に削除しますか？');\">削除</a></td>";
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
          <button onclick="location.href='../S02/S02_menu.php'" type="button" name="name" value="value" id="BackButton">戻る</button>  
    </main>
        <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>
