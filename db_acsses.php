<?php
// エラーレポートをオンにする
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost"; // サーバー名
$username = "root"; // ユーザー名
$password = ""; // パスワード
$dbname = "testdb"; // データベース名

// データベース接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQLクエリを実行
$sql = "SELECT id, name, age FROM menber"; // 例としてmenberテーブルのデータを取得
$result = $conn->query($sql);

// 結果が1行以上の場合データを表示
if ($result->num_rows > 0) {
    // データをHTMLテーブルとして出力
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    
    // 各行のデータを出力
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// 接続を閉じる
$conn->close();
?>
