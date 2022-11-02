<?php
session_start();
$mail = $_POST['mail'];
try {
    $pdo = new PDO('mysql:dbname=KASEDASABA;host=localhost;charset=utf8','kame','kame');
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM user WHERE mail = :mail";
$stm = $pdo->prepare($sql);
$stm->bindValue(':mail', $mail);
$stm->execute();
$member = $stm->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['password'], $member['password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    // echo'ログインしました。';
    $link = '<a href="mein.php">ホーム</a>';
    header('refresh:1;http://localhost/kame/mypage_prot.html');
    exit();
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.html">戻る</a>';
}
?>