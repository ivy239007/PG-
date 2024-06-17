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
  <div>
    <?php/*
    $username = "testuser"; // データベースユーザー
    $password = "pw4testuser"; // データベースパスワードを指定
    $dsn = "mysql:host=172.16.3.136:3306;dbname=test;charset=utf8"; // データベース名を指定
    //My SQLに接続
    try {
      $pdo = new PDO($dsn, $user, $password);
      // プリアドステートメントのエミュレーションを無効にする
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      // 例外がスローされる設定にする
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "データベース{$dbName}に接続しました。";
      // 接続を解除する
      $pdo = NULL; 
    } catch (Exception $e) {
      echo '<span class ="error">エラーがありました。</span><br>';
      echo $e->getMessage();
      exit();
    }
    */?>
  </div>

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
            <table id="DatabaseTable" border=1 width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>顧客ID</th>
                        <th>顧客名</th>
                        <th>性別</th>
                        <th>住所</th>
                        <th>生年月日</th>
                      </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                      <tr>
                        <td data-label="顧客ID">NULL</td>
                        <td data-label="顧客名">NULL</td>
                        <td data-label="性別">NULL</td>
                        <td data-label="住所">NULL</td>
                        <td data-label="生年月日">NULL</td>
                      </tr>
                </tbody>
              </table>
        </div>
        
          <button onclick="location.href='../S02/S02_menu.php'" type="button" name="name" value="value" id="BackButton">戻る</button>  
    </main>
        <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>