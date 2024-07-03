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

$servername = "172.16.3.136";
$username = "sample_user";
$password = "";
$dbname = "pg";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Book_id = $_GET["Book_id"];
$sql = "DELETE FROM books WHERE Book_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Book_id);

if ($stmt->execute() === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$stmt->close();
$conn->close();
header("Location: ../S04/S04.php"); // 削除後にメインページにリダイレクト
exit();
?>
