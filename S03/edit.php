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

    switch($State_id){
        case "1":
            $State_id = "北海道";
            break;
        case "2":
            $State_id = "青森県";
            break;
        case "3":
            $State_id = "岩手県";
            break;
        case "4":
            $State_id = "宮城県";
            break;
        case "5":
            $State_id = "秋田県";
            break;
        case "6":
            $State_id = "山形県";
            break;
        case "7":
            $State_id = "福島県";
            break;
        case "8":
            $State_id = "茨城県";
            break;
        case "9":
            $State_id = "栃木県";
            break;
        case "10":
            $State_id = "群馬県";
            break;
        case "11":
            $State_id = "埼玉県";
            break;
        case "12":
            $State_id = "千葉県";
            break;
        case "13":
            $State_id = "東京都";
            break;
        case "14":
            $State_id = "神奈川県";
            break;
        case "15":
            $State_id = "新潟県";
            break;
        case "16":
            $State_id = "富山県";
            break;
        case "17":
            $State_id = "石川県";
            break;
        case "18":
            $State_id = "福井県";
            break;
        case "19":
            $State_id = "山梨県";
            break;
        case "20":
            $State_id = "長野県";
            break;
        case "21":
            $State_id = "岐阜県";
            break;
        case "22":
            $State_id = "静岡県";
            break;
        case "23":
            $State_id = "愛知県";
            break;
        case "24":
            $State_id = "三重県";
            break;
        case "25":
            $State_id = "滋賀県";
            break;
        case "26":
            $State_id = "京都府";
            break;
        case "27":
            $State_id = "大阪府";
            break;
        case "28":
            $State_id = "兵庫県";
            break;
        case "29":
            $State_id = "奈良県";
            break;
        case "30":
            $State_id = "和歌山県";
            break;
        case "31":
            $State_id = "鳥取県";
            break;
        case "32":
            $State_id = "島根県";
            break;
        case "33":
            $State_id = "岡山県";
            break;
        case "34":
            $State_id = "広島県";
            break;
        case "35":
            $State_id = "山口県";
            break;
        case "36":
            $State_id = "徳島県";
            break;
        case "37":
            $State_id = "香川県";
            break;
        case "38":
            $State_id = "愛媛県";
            break;
        case "39":
            $State_id = "高知県";
            break;
        case "40":
            $State_id = "福岡県";
            break;
        case "41":
            $State_id = "佐賀県";
            break;
        case "42":
            $State_id = "長崎県";
            break;
        case "43":
            $State_id = "熊本県";
            break;
        case "44":
            $State_id = "大分県";
            break;
        case "45":
            $State_id = "宮崎県";
            break;
        case "46":
            $State_id = "鹿児島県";
            break;
        case "47":
            $State_id = "沖縄県";
            break;
    }
    
    switch($Gender){
        case "1":
            $Gender = "男性";
            break;
        case "2":
            $Gender = "女性";
            break;
        case "3":
            $Gender = "その他";
            break;
    }
} else {
    echo "No records found.";
    exit();
}

$gens = ["男性","女性","その他"];

$gender_sel = "<select name='gen_sel'>";
foreach( $gens as $gen ){
    $gender_sel .= "<option value='".$gen."' ";
    if($gen === $Gender){
        $gender_sel .= "selected";
    }
    $gender_sel .= ">";
    $gender_sel .= $gen;
    $gender_sel .= "</option>";
}
$gender_sel .= "</select>";

$state = ["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県",
"埼玉県","千葉県","東京都","神奈川県","新潟県","富山県","石川県","福井県","山梨県","長野県",
"岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県",
"鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県",
"佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県"];

$state_sel = "<select name='sta_sel'>";
foreach( $state as $sta ){
    $state_sel .= "<option value='".$sta."' ";
    if($sta === $State_id){
        $state_sel .= "selected";
    }
    $state_sel .= ">";
    $state_sel .= $sta;
    $state_sel .= "</option>";
}
$state_sel .= "</select name>";



$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>顧客編集画面</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>

<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <p>顧客編集画面</p>
    </header>

    <main>
        <form action="update.php" method="post">
            <div class="form-group">
                <input type="hidden" name="Cust_id" value="<?php echo $Cust_id; ?>">
                <label for="Name">&nbsp;顧&nbsp;客&nbsp;名&nbsp;</label>
                <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>">
            </div>

            <div class="form-group">
                <label for="State_id">&nbsp;住&emsp;&nbsp;所&nbsp;</label>
                
                <?php echo $state_sel;?>
            </div>

            <div class="form-group">
                <label for="Gender">&nbsp;性&emsp;&nbsp;別&nbsp;</label>
                <?php echo $gender_sel ;?>
            </div>
            
            <div class="form-group">
                <label for="Birth_day">生年月日</label>
                <input type="date" id="Birth_day" name="Birth_day" value="<?php echo htmlspecialchars($Birth_day); ?>">
            </div>
            
            <input type="submit" value="更新"> 
        </form>

    </main>

    <button onclick="location.href='S03.php'" type="button" name="name" value="value" id="BackButton">戻る</button>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>

</html>