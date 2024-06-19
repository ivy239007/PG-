<!DOCTYPE html>
<html lang="ja">
<head>
    <title>顧客管理画面</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
  </style>
    <link rel="stylesheet" type="text/css" href="S03_test.css">
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
                <input type="radio" id="searchChoice2" name="sea rchChoice" value="icchi" />
                <label for="searchChoice2">一致検索</label>
            </div>
        </form>
    </header>
    
    <main>
        <div class = "touroku">
            <button onclick="location.href='../S03_2,3/S03_2.html'" type="button" name="name" value="value" id = "tourokuButton">新規登録</button>
            <button onclick="location.href='../S03_2,3/S03_3.html'" type="button" name="name" value="value" id = "tourokuButton">編集</button>  
            <button type="button" name="name" value="value" id = "tourokuButton">削除</button>
        </div>
        
        
        <div>
          <?php//以下テスト中/2024/06/17
          // データベースユーザ
          $user = 'testuser';
          $password = 'pw4testuser';
          // 利用するデータベース
          $dbName = 'testdb';
          // MySQLサーバ
          $host = 'localhost:3306';
          // MySQLのDSN文字列
          $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
        
          //MySQLデータベースに接続する
          try {
            $pdo = new PDO($dsn, $user, $password);
            // プリペアドステートメントのエミュレーションを無効にする
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // 例外がスローされる設定にする
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "データベース{$dbName}に接続しました。";
            // 接続を解除する
            $pdo = NULL;
          } catch (Exception $e) {
            echo '<span class="error">エラーがありました。</span><br>';
            echo $e->getMessage();
            exit();
          }
          ?>
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
        
          <button onclick="location.href='../S02/S02_menu.html'" type="button" name="name" value="value" id="BackButton">戻る</button>  
    </main>
        <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
    </footer>
</body>
</html>