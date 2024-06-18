<?php
session_start();

// データベース接続情報
// $dsn = "mysql:host=localhost;dbname=test;charset=utf8"; // データベース名を指定
// $username = "root"; // データベースユーザー名を指定
// $password = ""; // データベースパスワードを指定
$dsn = "mysql:host=172.16.3.136:3306;dbname=pg;charset=utf8"; // データベース名を指定
$username = "sample_user"; // データベースユーザー名を指定
$password = ""; // データベースパスワードを指定

// フォームからの値を取得
$id = $_POST['id'];
$pw = $_POST['pw'];

try {
    
    // データベースに接続
    $dbh = new PDO($dsn, $username, $password);
    
    // ユーザーIDとパスワードでユーザーを検索
    $stmt = $dbh->prepare('SELECT * FROM manager WHERE Login_id = ?');
    //$stmt->bindParam(':id', $id);
    $data[] = $id;
    $stmt->execute($data);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pw == $user['Password']) {
        // ログイン成功時の処理
        $_SESSION['Login_id'] = $user['id']; // セッションにユーザーIDを保存
        header("Location: ../S02/S02_menu.php");
        exit; // リダイレクト後にスクリプトの実行を終了するために exit を使用
    } else {
        // ログイン失敗時の処理
        echo 'IDまたはパスワードが間違っています。';
        // エラーメッセージを表示してログインページにリダイレクト
        header("Location: S01_login.php");
        exit;
    }
} catch (PDOException $e) {
    // データベース接続エラー時の処理
    echo "エラー: " . $e->getMessage();
}
?>
