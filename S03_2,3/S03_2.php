<!DOCTYPE html>
<html lang="ja">


<head>
    <title>顧客新規登録</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="stylesS03_2.css"> 
</head>
<body>
    <header>
        <img src="../graphic/ニトリロゴ.jpg" alt="Logo" class="logo"> 
        <p>顧客新規登録フォーム</p>
    </header>
    
    <main>
        <form action="S03_2_1.php" method="post">
            <div class="form-group">
                <label for="kokyakuname">&nbsp;顧&nbsp;客&nbsp;名&nbsp;</label> 
                <input type="text" id="name" name="name" required autofocus placeholder="赤嶺昂太">
            </div>

            <div class="form-group">
                <label for="kokyakuname">フリガナ</label>
                <input type="text" id="name" name="kana" required autofocus placeholder="アカミネコウタ">
            </div> 

            <div class="form-group">
                <label for="sex">&nbsp;性&emsp;&nbsp;別&nbsp;</label>
                <td>
                    <input type="radio" name="gender" id="male" value="男性" checked><label for="male">男性&nbsp;&nbsp;</label>
                    <input type="radio" name="gender" id="female" value="女性"><label for="female">女性&nbsp;&nbsp;</label>
                    <input type="radio" name="gender" id="sonota" value="その他"><label for="sonota">その他</label>                
                </td>
            </div>

            <div class="form-group">
                <label for="date-edit">生年月日</label>
                <input type="date" name="date" id="date" value="2000-01-01" required>
            </div>

            <div class="form-group">
                <label for="adress">&nbsp;住&emsp;&nbsp;所&nbsp;</label> 
                <select name="pref">
                    <option value="">選択してください</option>
                    <option value="1">北海道</option>
                    <option value="2">青森県</option>
                    <option value="3">岩手県</option>
                    <option value="4">宮城県</option>
                    <option value="5">秋田県</option>
                    <option value="6">山形県</option>
                    <option value="7">福島県</option>
                    <option value="8">茨城県</option>
                    <option value="9">栃木県</option>
                    <option value="10">群馬県</option>
                    <option value="11">埼玉県</option>
                    <option value="12">千葉県</option>
                    <option value="13">東京都</option>
                    <option value="14">神奈川県</option>
                    <option value="15">新潟県</option>
                    <option value="16">富山県</option>
                    <option value="17">石川県</option>
                    <option value="18">福井県</option>
                    <option value="19">山梨県</option>
                    <option value="20">長野県</option>
                    <option value="21">岐阜県</option>
                    <option value="22">静岡県</option>
                    <option value="23">愛知県</option>
                    <option value="24">三重県</option>
                    <option value="25">滋賀県</option>
                    <option value="26">京都府</option>
                    <option value="27">大阪府</option>
                    <option value="28">兵庫県</option>
                    <option value="29">奈良県</option>
                    <option value="30">和歌山県</option>
                    <option value="31">鳥取県</option>
                    <option value="32">島根県</option>
                    <option value="33">岡山県</option>
                    <option value="34">広島県</option>
                    <option value="35">山口県</option>
                    <option value="36">徳島県</option>
                    <option value="37">香川県</option>
                    <option value="38">愛媛県</option>
                    <option value="39">高知県</option>
                    <option value="40">福岡県</option>
                    <option value="41">佐賀県</option>
                    <option value="42">長崎県</option>
                    <option value="43">熊本県</option>
                    <option value="44" selected>大分県</option>
                    <option value="45">宮崎県</option>
                    <option value="46">鹿児島県</option>
                    <option value="47">沖縄県</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="tel">電話番号</label>
                <input type="tel" name="tel" required autofocus placeholder="097-537-2471">
            </div>

            <div class="form-group">
                <label for="mail">ﾒｰﾙｱﾄﾞﾚｽ</label>
                <input type="email" name="email" required autofocus placeholder="info@ivy.ac.jp">
            </div>


            <div class="Btn">
                <input type="submit" value="登録">
            </div>
        </form>
        <button onclick="location.href='../S03/S03.html'" type="button" name="name" value="value" id="BackButton">戻る</button>
    </main>

    <footer>
        © 2024 <a href="https://www.ivy.ac.jp/">アイビクション</a>
        <div class="back">
        </div>

    </footer>
</body>
</html>