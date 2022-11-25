<?php
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
$regist = $pdo->prepare("SELECT * FROM post");
$regist->execute();
//ここで「登録失敗」だった場合、SQL文に誤りがあります。
if ($regist) {
    echo "登録成功";
} else {
    echo "登録失敗";
}
?>
<!-- 追記１ここまで -->

<!DOCTYPE html>
<meta charset="UTF-8">
<title>掲示板サンプル</title>
<h1>掲示板サンプル</h1>
<section>
    <h2>新規投稿</h2>
    <form action="send.php" method="post">
        名前 : <input type="text" name="name" value=""><br>
        投稿内容: <input type="text" name="contents" value=""><br>
        <button type="submit">投稿</button>
    </form>
</section>
 
<!-- 追記２ここから -->
<section>
	<h2>投稿内容一覧</h2>
		<?php foreach($regist as $loop):?>
			<div>No:<?php echo $loop['id']?></div>
			<div>名前：<?php echo $loop['name']?></div>
			<div>投稿内容：<?php echo $loop['contents']?></div>
			<div>------------------------------------------</div>
		<?php endforeach;?>
	
</section>