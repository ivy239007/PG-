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

// 書籍IDの取得
$Book_id = $_GET["Book_id"];

// 書籍情報の取得
$sql = "SELECT Book_id, Categories_id, Publisher, Book_name, Book_Publication, Author, Price FROM books WHERE Book_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Book_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // データが見つかった場合、フォームにデータをセットして表示する
    $row = $result->fetch_assoc();
    $Book_id = $row['Book_id'];
    $Categories_id = $row['Categories_id'];
    $Publisher = $row['Publisher'];
    $Book_name = $row['Book_name'];
    $Book_Publication = $row['Book_Publication'];
    $Author = $row['Author'];
    $Price = $row['Price'];
} else {
    // データが見つからない場合のエラー処理
    echo "書籍が見つかりませんでした。";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍編集</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="edit_04.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <p>書籍編集</p>
    </header>
    
    <main>
        
        <form action="update.php" method="post">

            <p>　</p>
            <input type="hidden" name="Book_id" value="<?php echo htmlspecialchars($Book_id); ?>">
            <label for="kokyakuname">&nbsp;カ&nbsp;テ&nbsp;ゴ&nbsp;リ&nbsp;ー&nbsp;I&nbsp;D&nbsp;</label>
            <input type="text" id="Categories_id" name="Categories_id" value="<?php echo htmlspecialchars($Categories_id); ?>">
            <label for="Publisher">出版社:</label>
            <input type="text" id="Publisher" name="Publisher" value="<?php echo htmlspecialchars($Publisher); ?>">
            <label for="Book_name">本の名前:</label>
            <input type="text" id="Book_name" name="Book_name" value="<?php echo htmlspecialchars($Book_name); ?>">
            <label for="Book_Publication">出版日:</label>
            <input type="date" id="Book_Publication" name="Book_Publication" value="<?php echo htmlspecialchars($Book_Publication); ?>">
            <label for="Author">著者:</label>
            <input type="text" id="Author" name="Author" value="<?php echo htmlspecialchars($Author); ?>">
            <label for="Price">価格:</label>
            <input type="text" id="Price" name="Price" value="<?php echo htmlspecialchars($Price); ?>">
            <p>　</p>
            <input type="submit" value="更新">
            <p>　</p>
        </form>        
    </main>

    <button onclick="location.href='S04.php'" type="button" name="name" value="value" id="BackButton">戻る</button>
    
    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>
