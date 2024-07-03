<?php
session_start();
if (isset($_SESSION['login']) == false) {
    print 'ログインされていません。<br/>';
    print '<a href="../S01/S01_login.php">ログイン画面へ</a>';
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
$Birth_day  = (String)$Birth_day;

switch($State_id){
    case "北海道":
        $State_id = 1;
        break;
    case "青森県":
        $State_id = 2;
        break;
    case "岩手県":
        $State_id = 3;
        break;
    case "宮城県":
        $State_id = 4;
        break;
    case "秋田県":
        $State_id = 5;
        break;
    case "山形県":
        $State_id = 6;
        break;
    case "福島県":
        $State_id = 7;
        break;
    case "茨城県":
        $State_id = 8;
        break;
    case "栃木県":
        $State_id = 9;
        break;
    case "群馬県":
        $State_id = 10;
        break;
    case "埼玉県":
        $State_id = 11;
        break;
    case "千葉県":
        $State_id = 12;
        break;
    case "東京都":
        $State_id = 13;
        break;
    case "神奈川県":
        $State_id = 14;
        break;
    case "新潟県":
        $State_id = 15;
        break;
    case "富山県":
        $State_id = 16;
            break;
    case "石川県":
        $State_id = 17;
        break;
    case "福井県":
        $State_id = 18;
        break;
    case "山梨県":
        $State_id = 19;
        break;
    case "長野県":
        $State_id = 20;
        break;
    case "岐阜県":
        $State_id = 21;
        break;
    case "静岡県":
        $State_id = 22;
        break;
    case "愛知県":
        $State_id = 23;
        break;
    case "三重県":
        $State_id = 24;
        break;
    case "滋賀県":
        $State_id = 25;
        break;
    case "京都府":
        $State_id = 26;
        break;
    case "大阪府":
        $State_id = 27;
        break;
    case "兵庫県":
        $State_id = 28;
        break;
    case "奈良県":
        $State_id = 29;
        break;
    case "和歌山県":
        $State_id = 30;
        break;
    case "鳥取県":
        $State_id = 31;
        break;
    case "島根県":
        $State_id = 32;
        break;
    case "岡山県":
        $State_id = 33;
        break;
    case "広島県":
        $State_id = 34;
        break;
    case "山口県":
        $State_id = 35;
        break;
    case "徳島県":
        $State_id = 36;
        break;
    case "香川県":
        $State_id = 37;
        break;
    case "愛媛県":
        $State_id = 38;
        break;
    case "高知県":
        $State_id = 39;
        break;
    case "福岡県":
        $State_id = 40;
        break;
    case "佐賀県":
        $State_id = 41;
        break;
    case "長崎県":
        $State_id = 42;
        break;
    case "熊本県":
        $State_id = 43;
        break;
    case "大分県":
        $State_id = 44;
        break;
    case "宮崎県":
        $State_id = 45;
        break;
    case "鹿児島県":
        $State_id = 46;
        break;
    case "沖縄県":
        $State_id = 47;
        break;
}

switch($Gender){
    case "男性";
        $Gender = "1";
        break;
    case "女性":
        $Gender = "2";
        break;
    case "その他":
        $Gender = "3";
        break;
}

$sql = "UPDATE customers SET Name=?, State_id=?, Gender=?, Birth_day=? WHERE Cust_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sisis", $Name, $State_id, $Gender, $Birth_day, $Cust_id);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>更新画面</title>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
  </style>
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
                echo "更新完了しました";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        ?>
        </div>
        
        <a href="S03.php">顧客管理画面に戻る</a>
    </main>
    </body>
</html>
