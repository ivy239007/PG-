<?php
$servername = "172.16.3.136";
$dbname = "pg"; // 使用するデータベース名を指定

// フォームから送信されたユーザー名とパスワードを受け取る
$username = $_POST['username'];
$password = $_POST['password'];

// MySQL接続を試みる
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続をチェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// 必要な処理をここに追加

$conn->close();
?>
