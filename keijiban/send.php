<!DOCTYPE html>
<meta charset="UTF-8">
<title>掲示板サンプル</title>
<h1>掲示板サンプル</h1>
<section>
    <h2>投稿完了</h2>
    <button onclick="location.href='index.php'">戻る</button>
</section>
 
<!-- 追記ここから -->
<?php
session_start ();
$use_id = $_SESSION['id']; 
$name = $_POST["name"];
$contents = $_POST["contents"];
date_default_timezone_set('Asia/Tokyo');
$created_at = date("Y-m-d H:i:s");
//DB接続情報を設定します。
$pdo = new PDO(
    "mysql:dbname=kasedasaba;host=localhost","kame","kame",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
//ここで「DB接続NG」だった場合、接続情報に誤りがあります。
if ($pdo) {
    echo "DB接続OK";
} else {
    echo "DB接続NG";
}
//SQLを実行。
$regist = $pdo->prepare("INSERT INTO post(name, contents, use_id, created_at) VALUES (:name,:contents,:use_id, :created_at)");
$regist->bindParam(":name", $name);
$regist->bindParam(":contents", $contents);
$regist->bindParam(":use_id", $use_id);
$regist->bindParam(":created_at", $created_at);

// $sql = 'INSERT INTO post(INSERT INTO post(name, contents, use_id, created_at) VALUES (:name,:contents,:use_id, :created_at)'; 
//           $stmt = $pdo->prepare($sql);
//           $stmt->bindValue(':name', $name, PDO::PARAM_STR);
//           $stmt->bindValue(':use_id', $use_id, PDO::PARAM_INT);
//           $stmt->bindValue(':contents', $contents, PDO::PARAM_STR);
//         //   $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);
//           $stmt->execute();         

$regist->execute();
//ここで「登録失敗」だった場合、SQL文に誤りがあります。
if ($regist) {
    echo "登録成功";
} else {
    echo "登録失敗";
}
?>