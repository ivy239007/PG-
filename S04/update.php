<?php
session_start();
if(isset($_SESSION['login']) == false){
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

// POST データの取得
$Book_id = $_POST["Book_id"];
$Categories_id = $_POST["Categories_id"];
$Publisher = $_POST["pub_sel"];
$Book_name = $_POST["Book_name"];
$Book_Publication = $_POST["Book_Publication"];
$Author = $_POST["Author"];
$Price = $_POST["Price"];

// SQL クエリの作成
$sql = "UPDATE books SET Categories_id=?, Publisher=?, Book_name=?, Book_Publication=?, Author=?, Price=? WHERE Book_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssi", $Categories_id, $Publisher, $Book_name, $Book_Publication, $Author, $Price, $Book_id);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>更新結果</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');</style>
    <link rel="stylesheet" type="text/css" href="update.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
    </header>
    
    <main>
        <div>
        <?php
            if ($stmt->execute()) {
                echo "書籍情報が更新されました。";
            } else {
                echo "更新中にエラーが発生しました:" . $stmt->error;
            }
            $stmt->close();
            $conn->close();
        ?>
        </div>
        
        <a href="S04.php">書籍管理画面に戻る</a>
    </main>
    </body>
</html>