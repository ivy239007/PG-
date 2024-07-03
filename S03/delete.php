<?php
session_start();
if(isset($_SESSION['login'])==false){
    print'ログインされていません。<br/>';
    print'<a href="../S01/S01_login.php">ログイン画面へ</a>';
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

// 顧客IDの取得
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $Cust_id = $_GET['id'];
    
    // SQLクエリの作成
    $sql = "DELETE FROM Customers WHERE Cust_id = ?";
    
    // 準備されたステートメントを作成
    if ($stmt = $conn->prepare($sql)) {
        // パラメータをバインド
        $stmt->bind_param("i", $Cust_id);
        
        // クエリを実行
        if ($stmt->execute()) {
            echo "レコードが正常に削除されました。<br>";
            echo '<a href="S03.php">顧客管理画面に戻る</a>';
        } else {
            echo "エラー: " . $stmt->error;
        }
        
        // ステートメントを閉じる
        $stmt->close();
    } else {
        echo "準備されたステートメントの作成に失敗しました: " . $conn->error;
    }
} else {
    echo "無効な顧客IDです。<br>";
    echo '<a href="S03.php">顧客管理画面に戻る</a>';
}

// 接続を閉じる
$conn->close();
?>
