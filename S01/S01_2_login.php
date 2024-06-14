<?php
session_start();
// データベース接続情報
$dsn = "mysql:host=127.0.0.1;dbname=test;charset=utf8"; // データベース名を指定
$username = "root"; // データベースユーザー名を指定
$password = ""; // データベースパスワードを指定

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
        header("Location: S02_menu.html");
        exit; // リダイレクト後にスクリプトの実行を終了するために exit を使用
    } else {
        // ログイン失敗時の処理
        echo 'IDまたはパスワードが間違っています。';
        // エラーメッセージを表示してログインページにリダイレクト
        header("Location: S01_login_test.html");
    }
} catch (PDOException $e) {
    // データベース接続エラー時の処理
    echo "エラー: " . $e->getMessage();
}
?>
