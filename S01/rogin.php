<?php
// データベース接続情報
$dsn = "mysql:host=localhost;dbname=xxx;charset=utf8";
$username = "xxx"; // データベースユーザー名
$password = "xxx"; // データベースパスワード
 
// フォームからの値を取得
$id = $_POST['id'];
$pw = $_POST['pw'];
 
try {
    // データベースに接続
    $dbh = new PDO($dsn, $username, $password);
    // ユーザーIDとパスワードでユーザーを検索
    $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
    if ($user && password_verify($pw, $user['pass'])) {
        // ログイン成功時の処理
        echo 'ログイン成功';
        // リダイレクトなどの処理を追加
    } else {
        // ログイン失敗時の処理
        echo 'IDまたはパスワードが間違っています。';
        // エラーメッセージを表示してログインページにリダイレクト
        // header("Location: login.html");
    }
} catch (PDOException $e) {
    // データベース接続エラー時の処理
    echo "エラー: " . $e->getMessage();
}
?>