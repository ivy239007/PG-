<?php
session_start();
if(isset($_SESSION['login']) == false){
    print 'ログインされていません。<br/>';
    print '<a href="../PG/S01/S01_login.php">ログイン画面へ</a>';
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

// POST データの取得
$Book_id = $_POST["Book_id"];
$Categories_id = $_POST["Categories_id"];
$Publisher = $_POST["Publisher"];
$Book_name = $_POST["Book_name"];
$Book_Publication = $_POST["Book_Publication"];
$Author = $_POST["Author"];
$Price = $_POST["Price"];

// SQL クエリの作成
$sql = "UPDATE books SET Categories_id=?, Publisher=?, Book_name=?, Book_Publication=?, Author=?, Price=? WHERE Book_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssi", $Categories_id, $Publisher, $Book_name, $Book_Publication, $Author, $Price, $Book_id);

// クエリの実行
if ($stmt->execute()) {
    echo "書籍情報が更新されました。";
} else {
    echo "更新中にエラーが発生しました: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>更新結果</title>
    <link rel="stylesheet" type="text/css" href="S04.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
    </header>
    
