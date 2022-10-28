
<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
echo"ログアウトしました。";
header('refresh:1;http://localhost/kame/hair/index.html');
    exit();
?>

