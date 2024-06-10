<?php
// データベース接続情報
$dsn = "mysql:host=localhost;dbname=pg;charset=utf8"; // データベース名を指定
$username = "your_username"; // データベースユーザー名を指定
$password = "your_password"; // データベースパスワードを指定

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
