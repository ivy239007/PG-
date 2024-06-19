<?php
session_start();
if(isset($_SESSION['login'])==false){
    print'ログインされていません。<br/>';
    print'<a href="../PG/S01/S01_login.php">ログイン画面へ</a>';
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


// デフォルトのソート順を設定（ID の昇順）
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'Cust_asc';
$order = '';
$Cust_id_sort_url = 'Cust_id_asc';
$Name = 'Name_asc';
$State_id = 'State_id_asc';
$Gender = 'Gender_asc';
$Birth_day = 'Birth_day_asc';

switch ($sort) {
    case 'Cust_id_asc':
        $order = 'Cust_id ASC';
        $id_sort_url = 'Cust_id_desc';
        break;
    case 'Cust_id_desc':
        $order = 'Cust_id DESC';
        $id_sort_url = 'Cust_id_asc';
        break;
    case 'Name_asc':
        $order = 'Name ASC';
        $Name_sort_url = 'Name_desc';
        break;
    case 'Name_desc':
        $order = 'Name DESC';
        $Name_sort_url = 'Name_asc';
        break;
    case 'State_id_asc':
        $order = 'State_id ASC';
        $State_id_sort_url = 'State_id_desc';
        break;
    case 'State_id_desc':
        $order = 'State_id DESC';
        $State_id_sort_url = 'State_id_asc';
        break;
    case 'Gender_asc':
        $order = 'Gender ASC';
        $Gender_sort_url = 'Gender_desc';
        break;
    case 'Gender_desc':
        $order = 'Gender DESC';
        $Gender_sort_url = 'Gender_asc';
        break;
    case 'Birth_day_asc':
        $order = 'Birth_day ASC';
        $Birth_day_sort_url = 'Birth_day_desc';
        break;
    case 'Birth_day_desc':
        $order = 'Birth_day DESC';
        $Birth_day_sort_url = 'Birth_day_asc';
        break;
    default:
        $order = 'Cust_id ASC';
        $id_sort_url = 'Cust_id_desc';
}

// SQLクエリを実行
//以下ざっくり
//購入テーブルから売上上位１０個取り出すSQL文くを書く、
//order By 購入数　DESC的なので、書籍IDで読み込んでBOOKを抽出する
//書籍IDを抽出して、Bookテーブルから当該の本データをとる、￥
//本データの名前など画面に返す
//INNER JOIN使って　一気にとるのも可

$sql = "SELECT Cust_id, Name, State_id, Gender, Birth_day FROM Customers ORDER BY $order"; // 例としてBuyテーブルのデータを取得
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset ="utf-8">
  <title>顧客管理画面</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
  </style>
    <link rel="stylesheet" type="text/css" href="S03.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <form action="user_list.php" method="post">
            <div class="search">
                <input type="text" size="80" name="kensaku">
                <input type="submit" value="検索">
            </div>
            <div class="radiobutton">
                <input type="radio" id="searchChoice1" name="searchChoice" value="aimai" />
                <label for="searchChoice1">あいまい検索</label>
                <input type="radio" id="searchChoice2" name="searchChoice" value="icchi" />
                <label for="searchChoice2">一致検索</label>
            </div>
        </form>
    </header>
    
    <main>
        <div class = "touroku">
            <button onclick="location.href='../S03_2,3/S03_2.php'" type="button" name="name" value="value" id = "tourokuButton">新規登録</button>
            <button onclick="location.href='../S03_2,3/S03_3.php'" type="button" name="name" value="value" id = "tourokuButton">編集</button>  
            <button type="button" name="name" value="value" id = "tourokuButton">削除</button>
        </div>
        
        <div class="DatabaseTable">
        <?php
        // 結果が1行以上の場合データを表示
        if ($result->num_rows > 0) {
            // データをHTMLテーブルとして出力
            echo "<table><tr>";
            echo "<th><a href='?sort=$Cust_id_sort_url'>Cust_id " . ($sort == 'Cust_id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Name_sort_url'>Name " . ($sort == 'Name_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$State_id_sort_url'>State_id " . ($sort == 'State_id_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Gender_sort_url'>Gender " . ($sort == 'Gender_asc' ? '▲' : '▼') . "</a></th>";
            echo "<th><a href='?sort=$Birth_day_sort_url'>Birth_day_id " . ($sort == 'Birth_day_asc' ? '▲' : '▼') . "</a></th>";
            echo "</tr>";
            
            // 各行のデータを出力
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Cust_id"]. "</td>";
                echo "<td>" . $row["Name"]. "</td>";
                echo "<td>" . $row["State_id"]. "</td>";
                echo "<td>" . $row["Gender"]. "</td>";
                echo "<td>" . $row["Birth_day"]. "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        // 接続を閉じる
        $conn->close();
        ?>
        </div>
          <button onclick="location.href='../S02/S02_menu.php'" type="button" name="name" value="value" id="BackButton">戻る</button>  
    </main>
        <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>