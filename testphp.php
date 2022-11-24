<?php
session_start ();
if(isset($_SESSION['name'])){
    // echo "ようこそ、".$_SESSION['name']."さん！";
  }else{
    header('refresh:0;http://localhost/kame/login.html');
    exit;
}
?>

<?php
require_once('k_functions.php');

$pdo = connectDB();
       
$sql = 'SELECT * FROM images';
$stmt = $pdo->prepare($sql);

$stmt->execute();
$stmt->fetchAll();

//配列の初期化
$userData=array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ //結果を配列で取得
    $Data[]=array(
        'id'=>$row['id'],
        'image_name'=>$row['name'],
        'image_type'=>$row['image_name'],
        'image_content'=>$row['image_content'],
        'image_size'=>$row['image_size'],
        'created_at'=>$row['created_at']
    );
}

$json = json_encode($Data);
echo $json;
?>