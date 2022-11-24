<?php
// データベースユーザ
$user = 'kame';
$password = 'kame';
// 利用するデータベース
$dbName = 'kasedasaba';
// MySQLサーバ
$host = 'localhost:3306';
// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>testphp</title>
</head>
<body>
<div>
  <?php
  //MySQLデータベースに接続する
  try {
    $pdo = new PDO($dsn, $user, $password);
    // プリペアドステートメントのエミュレーションを無効にする
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 例外がスローされる設定にする
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベース{$dbName}に接続しました。", "<br>";
    // SQL文を作る（全レコード）
    $sql = "SELECT * FROM images";
    // プリペアドステートメントを作る
    $stm = $pdo->prepare($sql);
    // SQL文を実行する
    $stm->execute();
    // 結果の取得（連想配列で返す）
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
      $userData=array(
        'id'=>$row['id'],
        'image_name'=>$row['image_name'],
        'watch'=>$row['watch']
      );
    }
    //$result = $stm->fetchAll(PDO::FETCH_ASSOC);
    // 実行
    print_r($userData);
    //header('Content-type: application/json');
    //echo json_encode($userData);
    //echo json_encode($result);
    } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }
  ?>
</div>
</body>
</html>
