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

$Cust_id = $_GET['id'];
$sql = "SELECT * FROM Customers WHERE Cust_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Cust_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Name = $row['Name'];
    $State_id = $row['State_id'];
    $Gender = $row['Gender'];
    $Birth_day = $row['Birth_day'];
} else {
    echo "No records found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>顧客編集画面</title>
    <link rel="stylesheet" type="text/css" href="S03.css">
</head>
<body>
    <h1>顧客編集画面</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="Cust_id" value="<?php echo $Cust_id; ?>">
        <label for="Name">顧客名:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>"><br>
        <label for="State_id">都道府県ID:</label>
        <input type="text" id="State_id" name="State_id" value="<?php echo $State_id; ?>"><br>
        <label for="Gender">性別:</label>
        <input type="text" id="Gender" name="Gender" value="<?php echo $Gender; ?>"><br>
        <label for="Birth_day">生年月日:</label>
        <input type="text" id="Birth_day" name="Birth_day" value="<?php echo $Birth_day; ?>"><br>
        <input type="submit" value="更新">
    </form>
</body>
</html>
