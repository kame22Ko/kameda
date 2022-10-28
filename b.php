<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>レコード追加</title>
<link href="../../../css/style.css" rel="stylesheet">
<!-- テーブル用のスタイルシート -->
<link href="../../css/tablestyle.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
  $gobackURL = "login_form.php";
  $name = $_POST['name'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  $mail = $_POST['mail'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //MySQLデータベースに接続する
  try {
    $pdo = new PDO('mysql:dbname=KASEDASABA;host=localhost;charset=utf8','kame','kame');
    // プリペアドステートメントのエミュレーションを無効にする
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 例外がスローされる設定にする
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL文を作る
    $sql = "INSERT INTO user (name, age, sex, mail, password) VALUES (:name, :age, :sex, :mail, :password)";
    // プリペアドステートメントを作る
    $stm = $pdo->prepare($sql);
    // プレースホルダに値をバインドする
    $stm->bindValue(':name', $name, PDO::PARAM_STR);
    $stm->bindValue(':age', $age, PDO::PARAM_INT);
    $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
    $stm->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stm->bindValue(':password', $password, PDO::PARAM_STR);
    // SQL文を実行する
    if ($stm->execute()){
      // レコード追加後のレコードリストを取得する
      $sql = "SELECT * FROM user";
      // プリペアドステートメントを作る
      $stm = $pdo->prepare($sql);
      // SQL文を実行する
      $stm->execute();
      // 結果の取得（連想配列で受け取る）
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);
      // テーブルのタイトル行
      echo "<table>";
      echo "<thead><tr>";
      echo "<th>", "ID", "</th>";
      echo "<th>", "名前", "</th>";
      echo "<th>", "年齢", "</th>";
      echo "<th>", "性別", "</th>";
      echo "<th>", "メールアドレス", "</th>";
      echo "<th>", "パスワード", "</th>";
      echo "</tr></thead>";
      // 値を取り出して行に表示する
      echo "<tbody>";
      foreach ($result as $row) {
        // １行ずつテーブルに入れる
        echo "<tr>";
        echo "<td>", $row['id'], "</td>";
        echo "<td>", $row['name'], "</td>";
        echo "<td>", $row['age'], "</td>";
        echo "<td>", $row['sex'], "</td>";
        echo "<td>", $row['mail'], "</td>";
        echo "<td>", $row['password'], "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
    } else {
      echo '<span class="error">追加エラーがありました。</span><br>';
    };
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
  }
  ?>
  <hr>
  <p><a href="<?php echo $gobackURL ?>">戻る</a></p>
</div>
</body>
</html>

<!-- １，同じメールアドレスが使えないように改造 -->