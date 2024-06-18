<?php
// エラーレポートをオンにする
error_reporting(E_ALL);
ini_set('display_errors', 1);

<<<<<<< HEAD
$servername = "localhost"; // データベースサーバーのIPアドレスまたはホスト名
$username = "root"; // データベースユーザー名
=======
$servername = "172.16.3.136"; // データベースサーバーのIPアドレスまたはホスト名
$username = "sample_user"; // データベースユーザー名
>>>>>>> 14b44f9c0c2d5cd200fcdcc08ad86b95369e8b1c
$password = ""; // データベースパスワード
$dbname = "pg"; // データベース名

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname,);

// 接続チェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// デフォルトのソート順を設定（ID の昇順）
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_asc';
$order = '';
$id_sort_url = 'id_asc';
$name_sort_url = 'name_asc';
$age_sort_url = 'age_asc';

switch ($sort) {
    case 'id_asc':
        $order = 'id ASC';
        $id_sort_url = 'id_desc';
        break;
    case 'id_desc':
        $order = 'id DESC';
        $id_sort_url = 'id_asc';
        break;
    case 'name_asc':
        $order = 'name ASC';
        $name_sort_url = 'name_desc';
        break;
    case 'name_desc':
        $order = 'name DESC';
        $name_sort_url = 'name_asc';
        break;
    case 'age_asc':
        $order = 'age ASC';
        $age_sort_url = 'age_desc';
        break;
    case 'age_desc':
        $order = 'age DESC';
        $age_sort_url = 'age_asc';
        break;
    default:
        $order = 'id ASC';
        $id_sort_url = 'id_desc';
}

// SQLクエリを実行
$sql = "SELECT id, name, age FROM menber ORDER BY $order"; // 例としてmenberテーブルのデータを取得
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Member Data</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="table-container">
        <?php
        // 結果が1行以上の場合データを表示
        if ($result->num_rows > 0) {
            // データをHTMLテーブルとして出力
            echo "<table><tr>";
            echo "<th><a href='?sort=$id_sort_url'>ID " . ($sort == 'id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$name_sort_url'>Name " . ($sort == 'name_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$age_sort_url'>Age " . ($sort == 'age_asc' ? '▲' : '▼') . "</a></th>";
            echo "</tr>";
            
            // 各行のデータを出力
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["age"]. "</td>";
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
</body>
</html>
