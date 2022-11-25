<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- <meta http-equiv="Refresh" content="0;URL=popup_meil.html"> -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>health first</title>
  <!-- Template Main CSS File -->
  <link href="../../../css/style.css" rel="stylesheet">
  <!-- テーブル用のスタイルシート -->
  <link href="../../css/tablestyle.css" rel="stylesheet">
</head>

<body>
    <div>
      <?php
      session_start ();
      $name1 = $_POST['name1'];
      $EMail = $_POST['EMail'];
      $age1 = $_POST['age1'];
      $contents = $_POST['contents'];
      $id1 = $_SESSION['id']; 


      if( filter_var( $EMail,FILTER_VALIDATE_EMAIL) ){
        //MySQLデータベースに接続する
        try {
          $pdo = new PDO('mysql:dbname=KASEDASABA;host=localhost;charset=utf8','kame','kame');
          // プリペアドステートメントのエミュレーションを無効にする
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          // 例外がスローされる設定にする
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // SQL文を作る
          $sql = "INSERT INTO inquery (name1, EMail, age1, contents, use_id) VALUES (:name1, :EMail, :age1, :contents, :use_id)";
          // プリペアドステートメントを作る
          $stm = $pdo->prepare($sql);
          // プレースホルダに値をバインドする
          $stm->bindValue(':name1', $name1, PDO::PARAM_STR);
          $stm->bindValue(':EMail', $EMail, PDO::PARAM_STR);
          $stm->bindValue(':age1', $age1, PDO::PARAM_INT);
          $stm->bindValue(':contents', $contents, PDO::PARAM_STR);
          $stm->bindValue(':use_id', $id1, PDO::PARAM_INT);

          if ($stm->execute()){
            // レコード追加後のレコードリストを取得する
            $sql = "SELECT * FROM inquery";
            // プリペアドステートメントを作る
            $stm = $pdo->prepare($sql);
            // SQL文を実行する
            $stm->execute();
            header('refresh:0;popup_meil.html');

          } else {
            echo '<span class="error">追加エラーがありました。</span><br>';
          };
        } catch (Exception $e) {
          echo '<span class="error">エラーがありました。</span><br>';
          echo $e->getMessage();
              }
    }else{
      header('refresh:0;popup_meiladress.html');
      // print_r("'$EMail'は不正な形式のメールアドレスです。");
        
    }
    ?>

