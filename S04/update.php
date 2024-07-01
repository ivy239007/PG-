<?php
session_start();
if (isset($_SESSION['login']) == false) {
    print 'ログインされていません。<br/>';
    print '<a href="../PG/S01/S01_login.php">ログイン画面へ</a>';
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

$Cust_id = $_POST['Cust_id'];
$Name = $_POST['Name'];
$State_id = $_POST['State_id'];
$Gender = $_POST['Gender'];
$Birth_day = $_POST['Birth_day'];

$sql = "UPDATE Customers SET Name=?, State_id=?, Gender=?, Birth_day=? WHERE Cust_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sisis", $Name, $State_id, $Gender, $Birth_day, $Cust_id);

if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<a href="S04.php">書籍管理画面に戻る</a>
