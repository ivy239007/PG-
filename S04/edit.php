<?php
session_start();
if(isset($_SESSION['login']) == false){
    print 'ログインされていません。<br/>';
    print '<a href="../S01/S01_login.php">ログイン画面へ</a>';
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

// 書籍IDの取得
$Book_id = $_GET["Book_id"];

// 書籍情報の取得
$sql = "SELECT Book_id, Categories_id, Publisher, Book_name, Book_Publication, Author, Price FROM books WHERE Book_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $Book_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // データが見つかった場合、フォームにデータをセットして表示する
    $row = $result->fetch_assoc();
    $Book_id = $row['Book_id'];
    
    //$sql = "SELECT categories FROM books INNER JOIN categories ON books.Categories_id = categories.Categories_ID";
    //$stmt = $conn->prepare($sql);
    //$stmt->bind_param("s", $categories);
    //$stmt->execute();
    //$Categories = $row['categories'];
    
    $Categories_id = $row['Categories_id'];
    $Publisher = $row['Publisher'];
    $Book_name = $row['Book_name'];
    $Book_Publication = $row['Book_Publication'];
    $Author = $row['Author'];
    $Price = $row['Price'];

    switch ($Publisher) {
        case "1":
            $Publisher = "講談社";
            break;
        case "2":
                $Publisher = "KADOKAWA";
                break;
        case "3":
                $Publisher = "集英社";
                break;
    }

} else {
    // データが見つからない場合のエラー処理
    echo "書籍が見つかりませんでした。";
    exit();
}

$pubs = ["講談社","KADOKAWA","集英社"];

$pub_sel = "<select name='pub_sel'>";
foreach( $pubs as $pub ){
    $pub_sel .= "<option value='".$pub."' ";
    if($pubs === $Publisher){
        $pub_sel .= "selected";
    }
    $pub_sel .= ">";
    $pub_sel .= $pub;
    $pub_sel .= "</option>";
}
$pub_sel .= "</select>";

$categories_list = ["文学・評論","人文・思想","社会・政治", "歴史・地理", "ビジネス・経済","投資・金融","科学・テクノロジー","医学・薬学","コンピュータ・IT",
"アート・デザイン","趣味・実用","スポーツ・アウトドア","資格・検定","暮らし・健康","旅行ガイド","語学・辞事典","教育・受験","絵本・児童書","ゲームブック","エンターテイメント","雑誌","楽譜・音楽書","古書"];

$cate_sel = "<select name='cate_sel'>";
foreach( $categories_list as $categories_index ){
    $cate_sel .= "<option value='".$categories_index."' ";
    if($categories_list === $Categories_id){
        $cate_sel .= "selected";
    }
    $cate_sel .= ">";
    $cate_sel .= $categories_index;
    $cate_sel .= "</option>";
}
$cate_sel .= "</select>";

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍編集</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="edit_04.css">
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo">
        <p>書籍編集</p>
    </header>
    
    <main>
        <form action="update.php" method="post">

            <div class="form-group">
                <input type="hidden" name="Book_id" value="<?php echo htmlspecialchars($Book_id); ?>">
                <label for="kokyakuname">分&emsp;&emsp;類</label>
                <?php echo $cate_sel ?>
            </div>

            <div class="form-group">
                <label for="Publisher">出&nbsp;&nbsp;版&nbsp;&nbsp;社</label>
                <?php echo $pub_sel ?>
            </div>

            <div class="form-group">
                <label for="Book_name">書&nbsp;&nbsp;籍&nbsp;&nbsp;名</label>
                <input type="text" id="Book_name" name="Book_name" value="<?php echo htmlspecialchars($Book_name); ?>">
            </div>

            <div class="form-group">
                <label for="Book_Publication">出&nbsp;&nbsp;版&nbsp;&nbsp;日</label>
                <input type="date" id="Book_Publication" name="Book_Publication" value="<?php echo htmlspecialchars($Book_Publication); ?>">
            </div>

            <div class="form-group">
                <label for="Author">著&nbsp;&nbsp;作&nbsp;&nbsp;者</label>
                <input type="text" id="Author" name="Author" value="<?php echo htmlspecialchars($Author); ?>">
            </div>

            <div class="form-group">
                <label for="Price">価&emsp;&emsp;格</label>
                <input type="text" id="Price" name="Price" value="<?php echo htmlspecialchars($Price); ?>">
            </div>

            <input type="submit" value="更新">
        </form>        
    </main>

    <button onclick="location.href='S04.php'" type="button" name="name" value="value" id="BackButton">戻る</button>
    
    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>
